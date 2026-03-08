<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
  protected $fillable = ['description',
    'type'];

  public static function log($description, $type) {
    self::create([
      'description' => $description,
      'type' => $type,
    ]);
  }
}