<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view("admin.services.index", compact("services"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        return redirect()->route("services.index")->with("success", "Layanan berhasil ditambahkan!");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view("admin.services.edit", compact("service"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
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
        $service->save();

        return redirect()->route("services.index")->with("success", "Layanan berhasil diupdate!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route("services.index")->with("success", "Layanan berhasil dihapus!");
    }
}
