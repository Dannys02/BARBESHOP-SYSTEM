<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Barber;
use App\Models\Service;
use App\Models\Appointment;
use App\Models\Activity;

class BarberController extends Controller {
  public function index() {
    $barbers = Barber::all();
    return view("admin.barbers.index", compact("barbers"));
  }

  public function create() {
    return view('admin.barbers.create');
  }

  public function store(Request $request) {
    $request->validate([
      "name" => "required|string|max:255",
      "bio" => "required",
      "photo" => "required|image|mimes:jpeg,jpg,png|max:2048",
    ], [
      'name.required' => 'Nama wajib diisi',
      'name.max' => 'Nama maksimal 255 karakter',
      'bio.required' => 'Bio wajib diisi',
      'photo.required' => 'Foto wajib diunggah',
      'photo.image' => 'File harus berupa gambar',
      'photo.mimes' => 'Foto harus jpeg, jpg, atau png',
      'photo.max' => 'Foto maksimal 2MB',
    ]);

    if ($request->hasFile("photo")) {
      $file = $request->file("photo");
      $path = $file->store("barbers", "public");
    }

    Barber::create([
      "name" => $request->name,
      "bio" => $request->bio,
      "photo" => $path,
    ]);

    Activity::log("Menambahkan barber baru: '$request->name'", "barber");

    return redirect()->route("barbers.index")->with("succes", "Barber berhasil ditambahkan!");
  }

  public function edit(Barber $barber) {
    return view("admin.barbers.edit", compact("barber"));
  }

  public function update(Request $request, Barber $barber) {
    $oldData = $barber->getOriginal();

    $request->validate([
      "name" => "required|string|max:255",
      "bio" => "required",
      "photo" => "nullable|image|mimes:jpeg,jpg,png|max:2048",
    ], [
      'name.required' => 'Nama wajib diisi',
      'name.max' => 'Nama maksimal 255 karakter',
      'bio.required' => 'Bio wajib diisi',
      'photo.image' => 'File harus berupa gambar',
      'photo.mimes' => 'Foto harus jpeg, jpg, atau png',
      'photo.max' => 'Foto maksimal 2MB',
    ]);

    // Update data teks
    $barber->name = $request->name;
    $barber->bio = $request->bio;

    // Logika Update Foto
    if ($request->hasFile("photo")) {
      // Hapus foto lama jika ada
      if ($barber->photo) {
        Storage::disk("public")->delete($barber->photo);
      }
      // Simpan foto baru dan ambil path-nya
      $path = $request->file("photo")->store("barbers", "public");
      $barber->photo = $path; // SIMPAN PATH STRING
    }

    // Cek apa yang berubah sebelum di save
    $changes = [];
    if ($barber->isDirty('name')) $changes[] = "Nama";
    if ($barber->isDirty('bio')) $changes[] = "Bio";
    if ($barber->isDirty('photo')) $changes[] = "Foto Profil";

    $barber->save();

    if (count($changes) > 0) {
      $detailChanges = implode(', ', $changes);
      Activity::log(
        "Memperbarui data barber: '{$barber->name}' (Bagian: {$detailChanges})",
        "barber"
      );
    }

    return redirect()->route("barbers.index")->with("success", "Barber berhasil diupdate!");
  }

  public function destroy(Barber $barber) {
    if ($barber->photo) {
      Storage::disk("public")->delete($barber->photo);
    }

    $barber->delete();
    
    Activity::log("Menghapus barber: '$barber->name' dari sistem", "barber");

    return redirect()->route("barbers.index")->with("succes", "Barber berhasil dihapus!");
  }
}