<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SportVenue;
use App\User;

class SportVenueWishlist extends Model
{
    protected $fillable = ['sportvenue_id', 'user_id'];

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function sportvenue() {
      return $this->belongsTo(SportVenue::class);
    }
}
