<?php

namespace App\Http\Controllers;

use App\SportVenueVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Country;
use App\Province;
use App\Regency;
use App\District;
use File;

class SportVenueVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = SportVenueVendor::all();
        return view('admin.sportvenue.vendor.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();

        return view('admin.sportvenue.vendor.create', compact('countries', 'provinces', 'regencies', 'districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $formInput = $request->except('country_id', 'province_id', 'regency_id', 'image1');

        $this->validate($request, [
          'name' => 'required',
          'district_id' => 'required',
          'image1' => 'required|image|mimes:png,jpg,jpeg|max:1000',
          'whatsapp' => 'required',
        ]);

        // Photo Upload
        $image1=$request->image1;
        $location="images/".$user->id."/vendor/";
        File::makeDirectory($location, 0777, true, true);
        if ($image1) {
          $imageName1=$image1->getClientOriginalName();
          $image1->move($location, $imageName1);
          $formInput['profile_photo'] = $imageName1;
        }

        $formInput['user_id'] = $user->id;
        SportVenueVendor::create($formInput);

        return redirect('/admin/sportvenue/vendor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SportVenueVendor  $sportVenueVendor
     * @return \Illuminate\Http\Response
     */
    public function show(SportVenueVendor $sportVenueVendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SportVenueVendor  $sportVenueVendor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = SportVenueVendor::find($id);
        $countries = Country::all();
        $provinces = Province::all();
        $regencies = Regency::where('province_id', $vendor->district->regency->province->id)->get();
        $districts = District::where('regency_id', $vendor->district->regency->id)->get();

        return view('admin.sportvenue.vendor.edit', compact('vendor', 'countries', 'provinces', 'regencies', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SportVenueVendor  $sportVenueVendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vendor = SportVenueVendor::find($id);

        $this->validate($request, [
          'name' => 'required',
          'district_id' => 'required',
          'image1' => 'image|mimes:png,jpg,jpeg|max:1000',
          'whatsapp' => 'required',
        ]);

        // Photo Upload
        $image1=$request->image1;
        $location="images/".$vendor->user->id."/vendor/";
        File::makeDirectory($location, 0777, true, true);
        if ($image1) {
          $imageName1=$image1->getClientOriginalName();
          $image1->move($location, $imageName1);
          $vendor->profile_photo = $imageName1;
        }

        $vendor->name = $request->name;
        $vendor->district_id = $request->district_id;
        $vendor->whatsapp = $request->whatsapp;
        $vendor->line = $request->line;
        $vendor->save();

        return redirect('/admin/sportvenue/vendor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SportVenueVendor  $sportVenueVendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SportVenueVendor::find($id)->delete();

        return redirect('/admin/sportvenue/vendor');
    }
}
