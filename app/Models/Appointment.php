<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function barber() {
      return $this->belongsTo(Barber::class);
    }
    
    public function services() {
      return $this->belongsTo(Service::class);
    }
}
