<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
  protected $fillable = ['description',
    'type'];

  public static function log($description, $type) {
    // Simpan aktivitas baru
    self::create([
      'description' => $description,
      'type' => $type,
    ]);

    // Ambil ID dari 5 data terbaru
    $latestIds = self::latest()->take(5)->pluck('id');

    // Hapus semua data yang ID-nya TIDAK ada di dalam daftar 5 terbaru
    self::whereNotIn('id', $latestIds)->delete();
  }
}