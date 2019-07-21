<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\SocialProvider;
use App\Blog;
use App\UserProfile;
use App\Team;
use App\TeamFavourite;
use App\TeamReview;
use App\SportVenueVendor;
use App\SportVenueReview;
use App\DonationDonor;
use App\DonationReport;
use App\SportVenueBooking;
use App\SportVenueWishlist;
use App\TicketBooking;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin', 'vendor', 'verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($user) {
          $user->token = str_random(40);
        });
    }

    public function hasVerified()
    {
        $this->verified = true;
        $this->token = null;
        $this->save();
    }

    public function socialProviders() {
        return $this->hasOne(SocialProvider::class);
    }

    public function blogs() {
        return $this->hasMany(Blog::class);
    }

    public function userprofile() {
        return $this->hasOne(UserProfile::class);
    }

    public function teams() {
        return $this->hasMany(Team::class);
    }

    public function teamfavourites() {
        return $this->hasMany(TeamFavourite::class);
    }

    public function teamreviews() {
        return $this->hasMany(TeamReview::class);
    }

    public function sportvenuevendors() {
        return $this->hasMany(SportVenueVendor::class);
    }

    public function sportvenuereviews() {
        return $this->hasMany(SportVenueReview::class);
    }

    public function donationdonors() {
        return $this->hasMany(DonationDonor::class);
    }

    public function donationreports() {
        return $this->hasMany(DonationReport::class);
    }

    public function sportvenuebookings() {
        return $this->hasMany(SportVenueBooking::class);
    }

    public function sportvenuewishlists() {
        return $this->hasMany(SportVenueWishlist::class);
    }

    public function ticketbookings() {
        return $this->hasMany(TicketBooking::class);
    }
}
