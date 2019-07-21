<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Province;
use App\TicketOrganizer;

class Country extends Model
{
    public function provinces() {
      return $this->hasMany(Province::class);
    }

    public function ticketorganizers() {
      return $this->hasMany(TicketOrganizer::class);
    }
}
