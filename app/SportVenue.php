<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SportVenueCategory;
use App\SportVenueVendor;
use App\SportVenueDescription;
use App\SportVenuePrice;
use App\SportVenueReview;
use App\SportVenueWishlist;
use App\SportVenueBooking;
use App\Regency;
use App\District;

class SportVenue extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function sportvenuecategory() {
      return $this->belongsTo(SportVenueCategory::class);
    }

    public function sportvenuevendor() {
      return $this->belongsTo(SportVenueVendor::class);
    }

    public function sportvenuedescription() {
      return $this->hasOne(SportVenueDescription::class, 'sportvenue_id');
    }

    public function sportvenueprices() {
      return $this->hasMany(SportVenuePrice::class, 'sportvenue_id');
    }

    public function sportvenuereviews() {
      return $this->hasMany(SportVenueReview::class, 'sportvenue_id');
    }

    public function sportvenuewishlists() {
        return $this->hasMany(SportVenueWishlist::class, 'sportvenue_id');
    }

    public function sportvenuebookings() {
        return $this->hasMany(SportVenueBooking::class, 'sportvenue_id');
    }

    public function regency() {
      return $this->belongsTo(Regency::class);
    }

    public function district() {
      return $this->belongsTo(District::class);
    }
}
