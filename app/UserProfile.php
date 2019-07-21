<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\District;

class UserProfile extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function district() {
      return $this->belongsTo(District::class);
    }
}
