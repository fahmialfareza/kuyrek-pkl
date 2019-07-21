<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserProfile;
use App\Country;
use App\Province;
use App\Regency;
use App\District;
use App\Village;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    // My Profile
    public function myprofile() {
      $user = Auth::user();
      $userprofile = $user->userprofile();

      if ($userprofile->where('user_id', $user->id)->count() > 0) {
        return view('home.myprofile', compact('user', 'userprofile'));
      } else {
        return redirect('/home/setting');
      }
    }

    // Setting
    public function setting() {
      $user = Auth::user();
      $countries = Country::all();
      if (UserProfile::where('user_id', $user->id)->count() > 0) {
        $provinces = Province::where('country_id', $user->userprofile->district->regency->province->country->id)->get();
        $regencies = Regency::where('province_id', $user->userprofile->district->regency->province->id)->get();
        $districts = District::where('regency_id', $user->userprofile->district->regency->id)->get();
      } else {
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
      }

      return view('home.setting', compact('user', 'countries', 'provinces', 'regencies', 'districts'));
    }

    public function setting_store(Request $request) {
      $user = Auth::user();

      $formInput = $request->except('name', 'country_id', 'province_id', 'regency_id', 'profile_photo');

      $this->validate($request, [
        'name' => 'required',
        'country_id' => 'required',
        'province_id' => 'required',
        'regency_id' => 'required',
        'district_id' => 'required',
        'profile_photo' => 'required|image|mimes:png,jpg,jpeg|max:1000',
        'whatsapp' => 'min:6|max:20|required',
        'line' => 'required',
        'status' => 'max:191|required',
      ]);

      // Photo Upload
      $image=$request->profile_photo;
      $location="images/user/".$user->id."/";
      File::makeDirectory($location, 0777, true, true);
      if ($image) {
        $imageName=$image->getClientOriginalName();
        $image->move($location, $imageName);
        $formInput['profile_photo']=$imageName;
      }

      $formInput['user_id'] = $user->id;

      $user->name = $request->name;
      $user->save();

      UserProfile::create($formInput);

      return redirect('/home/myprofile');
    }

    public function setting_update(Request $request, $id) {
      $userprofile = UserProfile::find($id);

      if ($userprofile->user_id == Auth::user()->id) {
        $user = $userprofile->user;

        $formInput = $request->except('name', 'country_id', 'province_id', 'regency_id', 'profile_photo');

        $this->validate($request, [
          'name' => 'required',
          'country_id' => 'required',
          'province_id' => 'required',
          'regency_id' => 'required',
          'district_id' => 'required',
          'whatsapp' => 'min:6|max:20|required',
          'line' => 'required',
          'status' => 'max:191|required',
          'profile_photo' => 'image|mimes:png,jpg,jpeg|max:1000',
        ]);

        // Photo Upload
        $image=$request->profile_photo;
        $location="images/user/".$user->id."/";
        File::makeDirectory($location, 0777, true, true);
        if ($image) {
          $imageName=$image->getClientOriginalName();
          $image->move($location, $imageName);
          $userprofile->profile_photo=$imageName;
        }

        $user->name = $request->name;
        $user->save();

        $userprofile->district_id = $request->district_id;
        $userprofile->whatsapp = $request->whatsapp;
        $userprofile->line = $request->line;
        $userprofile->status = $request->status;
        $userprofile->save();

        return redirect('/home/myprofile');
      } else {
        return back();
      }
    }

    // Password
    public function password() {
      return view('home.password');
    }

    public function password_update(Request $request) {
      $user = Auth::user();
      $userprofile = $user->userprofile();

      $this->validate($request, [
        'password' => 'required|min:6|max:32',
        'confirm_password' => 'required|min:6|max:32',
      ]);

      if ($request->password != $request->confirm_password) {
        return back()->with('status', 'Kata sandi tidak sama!');
      } else {
        $user->password = bcrypt($request->password);
        $user->save();

        if ($userprofile->where('user_id', $user->id)->count() > 0) {
          return back()->with('status1', 'Kata sandi berhasil diganti');
        } else {
          return redirect('/home/setting')->with('status', 'Silahkan isi data diri Anda');
        }
      }
    }
}
