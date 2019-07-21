<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\District;

class Village extends Model
{
  public function district() {
    return $this->belongsTo(District::class);
  }
}
