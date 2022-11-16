<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalitaPosyandu extends Model
{
  use HasFactory;

  public function balita()
  {
    return $this->belongsTo(Balita::class);
  }

  public function imunisasi()
  {
    return $this->belongsTo(Imunisasi::class);
  }

  public function keluarga()
  {
    return $this->hasOneThrough(Balita::class, User::class);
  }
}
