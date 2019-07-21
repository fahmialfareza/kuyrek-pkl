<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\SportVenue;
use App\District;

class SportVenueVendor extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function sportvenues() {
      return $this->hasMany(SportVenue::class);
    }

    public function district() {
      return $this->belongsTo(District::class);
    }
}
