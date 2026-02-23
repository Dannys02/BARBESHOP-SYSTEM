<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Barber;
use App\Models\Service;
use App\Models\Appointment;

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

    return redirect()->route("barbers.index")->with("succes", "Barber berhasil ditambahkan!");
  }

  public function edit(Barber $barber) {
    return view("admin.barbers.edit", compact("barber"));
  }

  public function update(Request $request, Barber $barber) {
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

    $barber->name = $request->name;
    $barber->bio = $request->bio;

    if ($request->hasFile("photo")) {
      if ($barber->photo) {
        Storage::disk("public")->delete($barber->photo);
      }
      $barber->photo = $request->file("photo");

      $barber->save();

      return redirect()->route("barbers.index")->with("succes", "Barber berhasil diupdate!");
    }
  }

  public function destroy(Barber $barber) {
    if ($barber->photo) {
      Storage::disk("public")->delete($barber->photo);
    }

    $barber->delete();

    return redirect()->route("barbers.index")->with("succes", "Barber berhasil dihapus!");
  }
}
