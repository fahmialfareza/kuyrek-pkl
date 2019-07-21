<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Country;
use App\Province;
use App\Regency;
use App\District;
use App\Village;
use App\SportVenueCategory;
use App\SportVenue;

class FrontController extends Controller
{
    public function home() {
      $sportcategories = SportVenueCategory::all();
      $sportvenues = new SportVenue;

      return view('front.home', compact('sportcategories', 'sportvenues'));
    }

    // KO
    public function about() {
      return view('front.ko.about');
    }

    public function award() {
      return view('front.ko.award');
    }

    public function coverage() {
      return view('front.ko.coverage');
    }

    public function gallery() {
      return view('front.ko.gallery');
    }

    public function merchandise() {
      return view('front.ko.merchandise');
    }

    public function ourteam() {
      return view('front.ko.ourteam');
    }

    //User
    public function howtouseuser() {
      return view('front.user.howtouseuser');
    }

    public function payment() {
      return view('front.user.payment');
    }

    public function secureguarantee() {
      return view('front.user.secureguarantee');
    }

    // Vendor
    public function howtousevendor() {
      return view('front.vendor.howtousevendor');
    }

    public function vendoradvantages() {
      return view('front.vendor.vendoradvantages');
    }

    public function vendortips() {
      return view('front.vendor.vendortips');
    }

    public function vendordirectory() {
      return view('front.vendor.vendordirectory');
    }

    public function user($id) {
      $user = User::find($id);

      return view('account.index', compact('user'));
    }

    // Provinces
    public function provinces($id){
      $provinces = Province::where('country_id', $id)->get();
      return response()->json($provinces);
    }

    // Regencies
    public function regencies($id){
      $regencies = Regency::where('province_id', $id)->get();
      return response()->json($regencies);
    }

    // Districts
    public function districts($id){
      $districts = District::where('regency_id', $id)->get();
      return response()->json($districts);
    }

    // Villages
    public function villages($id){
      $villlages = Village::where('district_id', $id)->get();
      return response()->json($villlages);
    }
}
