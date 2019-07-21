<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SportVenue;
use App\User;

class SportVenueReview extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function sportvenue() {
      return $this->belongsTo(SportVenue::class);
    }
}
