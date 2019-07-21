<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SportVenue;

class SportVenueDescription extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function sportvenue() {
      return $this->belongsTo(SportVenue::class);
    }
}
