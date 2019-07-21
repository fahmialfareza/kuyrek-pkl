<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SportVenue;
use App\SportVenueBooking;

class SportVenuePrice extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function sportvenue() {
      return $this->belongsTo(SportVenue::class);
    }

    public function sportvenuebookings() {
      return $this->hasMany(SportVenueBooking::class, 'sportvenueprice_id');
    }
}
