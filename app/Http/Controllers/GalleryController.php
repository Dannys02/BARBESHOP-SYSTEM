<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        // Batasi maksimal 5
        if (Gallery::count() >= 5) {
            return redirect()->route('galleries.index')
                ->with('error', 'Maksimal hanya 5 gambar!');
        }

        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
        ]);

        // Cek limit
        if (Gallery::count() >= 5) {
            return redirect()->route('galleries.index')
                ->with('error', 'Maksimal hanya 5 gambar!');
        }

        // Upload gambar
        $path = $request->file('image')->store('gallery', 'public');

        // Simpan ke DB
        Gallery::create([
            'image' => $path,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
        ]);

        return redirect()->route('galleries.index')
            ->with('success', 'Gambar berhasil ditambahkan');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        // Validasi
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
        ]);

        // Kalau upload gambar baru
        if ($request->hasFile('image')) {

            // Hapus gambar lama
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            // Simpan gambar baru
            $gallery->image = $request->file('image')->store('gallery', 'public');
        }

        // Update data lain
        $gallery->title = $request->title;
        $gallery->subtitle = $request->subtitle;
        $gallery->save();

        return redirect()->route('galleries.index')
            ->with('success', 'Gambar berhasil diupdate');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Hapus file dari storage
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        // Hapus dari database
        $gallery->delete();

        return redirect()->route('galleries.index')
            ->with('success', 'Gambar berhasil dihapus');
    }
}
