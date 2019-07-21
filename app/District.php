<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Regency;
use App\Village;
use App\UserProfile;
use App\Team;
use App\SportVenueVendor;
use App\SportVenue;

class District extends Model
{
  public function regency() {
    return $this->belongsTo(Regency::class);
  }

  public function villages() {
    return $this->hasMany(Village::class);
  }

  public function userprofiles() {
    return $this->hasMany(UserProfile::class);
  }

  public function teams() {
    return $this->hasMany(Team::class);
  }

  public function sportvenuevendors() {
    return $this->hasMany(SportVenueVendor::class);
  }

  public function sportvenues() {
    return $this->hasMany(SportVenue::class);
  }
}
