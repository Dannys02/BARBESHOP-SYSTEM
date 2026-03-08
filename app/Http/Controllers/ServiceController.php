<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Activity;

class ServiceController extends Controller
{
  /**
  * Display a listing of the resource.
  */
  public function index() {
    $services = Service::all();
    return view("admin.services.index", compact("services"));
  }

  /**
  * Show the form for creating a new resource.
  */
  public function create() {
    return view('admin.services.create');
  }

  /**
  * Store a newly created resource in storage.
  */
  public function store(Request $request) {
    $request->validate([
      "name" => "required|string|max:255",
      "price" => "required|integer|min:0",
      "duration" => "required|integer|min:1",
    ], [
      'name.required' => 'Nama layanan wajib diisi',
      'name.max' => 'Nama maksimal 255 karakter',
      'price.required' => 'Harga wajib diisi',
      'price.integer' => 'Harga harus berupa angka',
      'price.min' => 'Harga tidak boleh kurang dari 0',
      'duration.required' => 'Durasi wajib diisi',
      'duration.integer' => 'Durasi harus berupa angka',
      'duration.min' => 'Durasi minimal 1 menit',
    ]);

    Service::create([
      "name" => $request->name,
      "price" => $request->price,
      "duration" => $request->duration,
    ]);

    Activity::log("Menambahkan layanan baru: '$request->name'", "layanan");

    return redirect()->route("services.index")->with("success", "Layanan berhasil ditambahkan!");
  }

  /**
  * Show the form for editing the specified resource.
  */
  public function edit(Service $service) {
    return view("admin.services.edit", compact("service"));
  }

  /**
  * Update the specified resource in storage.
  */
  public function update(Request $request, Service $service) {
    $oldData = $service->getOriginal();

    $request->validate([
      "name" => "required|string|max:255",
      "price" => "required|integer|min:0",
      "duration" => "required|integer|min:1",
    ], [
      'name.required' => 'Nama layanan wajib diisi',
      'name.max' => 'Nama maksimal 255 karakter',
      'price.required' => 'Harga wajib diisi',
      'price.integer' => 'Harga harus berupa angka',
      'price.min' => 'Harga tidak boleh kurang dari 0',
      'duration.required' => 'Durasi wajib diisi',
      'duration.integer' => 'Durasi harus berupa angka',
      'duration.min' => 'Durasi minimal 1 menit',
    ]);

    $service->name = $request->name;
    $service->price = $request->price;
    $service->duration = $request->duration;

    $changes = [];
    if ($service->isDirty('name')) $changes[] = "Nama";
    if ($service->isDirty('price')) $changes[] = "Harga";
    if ($service->isDirty('duration')) $changes[] = "Durasi";

    $service->save();
    
    if (count($changes) > 0) {
      $detailChanges = implode(', ', $changes);
      Activity::log(
        "Memperbarui data layanan: '{$service->name}' (Bagian: {$detailChanges})",
        "layanan"
      );
    }

    return redirect()->route("services.index")->with("success", "Layanan berhasil diupdate!");
  }

  /**
  * Remove the specified resource from storage.
  */
  public function destroy(Service $service) {
    $service->delete();
    
    Activity::log("Menghapus layanan: '$service->name' dari sistem", "layanan");

    return redirect()->route("services.index")->with("success", "Layanan berhasil dihapus!");
  }
}