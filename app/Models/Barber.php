<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    protected $fillable = ['name', 'photo', 'bio'];
    
    public function appointments() {
      return $this->hasMany(Appointment::class);
    }
}
