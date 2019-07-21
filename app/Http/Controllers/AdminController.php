<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SportVenue;
use App\SportVenueBooking;

class AdminController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('admin');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $users = User::where('admin', 0)->where('vendor', 0)->get();
      $bookings = SportVenueBooking::all();

      return view('admin.dashboard.index', compact('users', 'bookings'));
  }

  public function sportvenues() {
      $sportvenues = SportVenue::all();
      return view('admin.sportvenue.index', compact('sportvenues'));
  }
}
