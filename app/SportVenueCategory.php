<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportVenueCategory extends Model
{
    protected $fillable = ['name'];

    public function sportvenues() {
      return $this->hasMany(SportVenue::class);
    }
}
