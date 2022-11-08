<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanIbuHamil extends Model
{
  use HasFactory;

  public function ibuHamil()
  {
    return $this->belongsTo(IbuHamil::class);
  }
}
