<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SportVenueCategory;
use App\SportVenueVendor;
use App\SportVenue;
use App\SportVenueDescription;
use App\SportVenuePrice;
use App\SportVenueBooking;
use App\Country;
use App\Regency;
use App\Province;
use App\District;
use File;

class SportVenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sportvenues = new SportVenue;
        $categories = SportVenueCategory::all();
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();

        if ($request->has('search')) {
          $sportvenues = $sportvenues->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('sortby')) {
          if ($request->sortby==1) {
            $sportvenues = $sportvenues;
          } elseif ($request->sortby == 2) {
            $sportvenues = $sportvenues;
          } elseif ($request->sortby == 3) {
            $sportvenues = $sportvenues->orderBy('see', 'desc');
          } elseif ($request->sortby == 4) {
            $sportvenues = $sportvenues->orderBy('star', 'desc');
          } elseif ($request->sortby == 5) {
            $sportvenues = $sportvenues->orderBy('official', 'desc');
          } elseif ($request->sortby == 6) {
            $sportvenues = $sportvenues->orderBy('official', 'asc');
          } else {
            $sportvenues = $sportvenues;
          }
        }

        if ($request->has('category')) {
          if ($request->category == 0) {
            $sportvenues = $sportvenues;
          } else {
            $sportvenues = $sportvenues->where('sportvenuecategory_id', $request->category);
          }
        }

        if ($request->has('province')) {
          $sportvenues = $sportvenues->where('province_id', $request->province);
          $regencies = Regency::where('province_id', $request->province)->get();
        }

        if ($request->has('regency')) {
          $sportvenues = $sportvenues->where('regency_id', $request->regency);
          $districts = District::where('regency_id', $request->regency)->get();
        }

        if ($request->has('district')) {
          if ($request->district == 0) {
            $sportvenues = $sportvenues;
          } else {
            $sportvenues = $sportvenues->where('district_id', $request->district);
          }
        }

        if ($request->has('pagination')) {
          $sportvenues = $sportvenues->paginate($request->pagination);
        } else {
          $sportvenues = $sportvenues->paginate(12);
        }

        return view('sportvenue.index', compact('request', 'sportvenues', 'categories', 'provinces', 'regencies', 'districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = SportVenueCategory::all();
        $vendors = SportVenueVendor::all();
        $countries = Country::all();
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();

        return view('admin.sportvenue.create', compact('categories', 'vendors', 'countries', 'provinces', 'regencies', 'districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->except('image1', 'image2', 'image3', 'image4', 'searchmap', 'lat', 'lng', 'address', 'country_id');

        $this->validate($request, [
          'name' => 'required',
          'sportvenuecategory_id' => 'required',
          'image1' => 'required|image|mimes:png,jpg,jpeg|max:1000',
          'image2' => 'image|mimes:png,jpg,jpeg|max:1000',
          'image3' => 'image|mimes:png,jpg,jpeg|max:1000',
          'image4' => 'image|mimes:png,jpg,jpeg|max:1000',
          'sportvenuevendor_id' => 'required',
          'province_id' => 'required',
          'regency_id' => 'required',
          'district_id' => 'required',
          'official' => 'required',
          'lat' => 'required',
          'lng' => 'required',
          'address' => 'required',
        ]);

        // Photo Upload
        $image1=$request->image1;
        $image2=$request->image2;
        $image3=$request->image3;
        $image4=$request->image4;
        $location="images/".$request->sportvenuevendor_id."/sportvenue/";
        File::makeDirectory($location, 0777, true, true);
        if ($image1) {
          $imageName1=$image1->getClientOriginalName();
          $image1->move($location, $imageName1);
          $formInput['image1'] = $imageName1;
        }
        if ($image2) {
          $imageName2=$image2->getClientOriginalName();
          $image2->move($location, $imageName2);
          $formInput['image2'] = $imageName2;
        }
        if ($image3) {
          $imageName3=$image3->getClientOriginalName();
          $image3->move($location, $imageName3);
          $formInput['image3'] = $imageName3;
        }
        if ($image4) {
          $imageName4=$image4->getClientOriginalName();
          $image4->move($location, $imageName4);
          $formInput['image4'] = $imageName4;
        }

        $id = SportVenue::create($formInput)->id;

        SportVenueDescription::create([
          'sportvenue_id' => $id,
          'lat' => $request->lat,
          'lng' => $request->lng,
          'address' => $request->address,
        ]);

        return redirect('/admin/sportvenue');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showofficial($id)
    {
        $sportvenue = SportVenue::find($id);
        $sportvenuevendors = SportVenue::where('sportvenuevendor_id', $sportvenue->sportvenuevendor_id)->where('id', '!=', $id)->paginate(3);
        $sportvenues = new SportVenue;
        $sportvenuebookings = SportVenueBooking::all();

        if ($sportvenue->official != 1) {
          return redirect('/sportvenuenotofficial/'.$id);
        }

        $sportvenue->see += 1;
        $sportvenue->save();

        return view('sportvenue.showofficial', compact('sportvenue', 'sportvenuevendors', 'sportvenues', 'id'));
    }

    public function shownotofficial($id)
    {
        $sportvenue = SportVenue::find($id);
        $sportvenuevendors = SportVenue::where('sportvenuevendor_id', $sportvenue->sportvenuevendor_id)->where('id', '!=', $id)->paginate(3);
        $sportvenues = new SportVenue;

        if ($sportvenue->official == 1) {
          return redirect('/sportvenueofficial/'.$id);
        }

        $sportvenue->see += 1;
        $sportvenue->save();

        return view('sportvenue.shownotofficial', compact('sportvenue', 'sportvenuevendors', 'sportvenues'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = SportVenueCategory::all();
        $sportvenue = SportVenue::find($id);
        $vendors = SportVenueVendor::all();
        $countries = Country::all();
        $provinces = Province::all();
        $regencies = Regency::where('province_id', $sportvenue->district->regency->province->id)->get();
        $districts = District::where('regency_id', $sportvenue->district->regency->id)->get();

        return view('admin.sportvenue.edit', compact('sportvenue', 'categories', 'vendors', 'countries', 'provinces', 'regencies', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sportvenue = SportVenue::find($id);

        $this->validate($request, [
          'name' => 'required',
          'sportvenuecategory_id' => 'required',
          'image1' => 'image|mimes:png,jpg,jpeg|max:1000',
          'image2' => 'image|mimes:png,jpg,jpeg|max:1000',
          'image3' => 'image|mimes:png,jpg,jpeg|max:1000',
          'image4' => 'image|mimes:png,jpg,jpeg|max:1000',
          'sportvenuevendor_id' => 'required',
          'province_id' => 'required',
          'regency_id' => 'required',
          'district_id' => 'required',
          'official' => 'required',
          'lat' => 'required',
          'lng' => 'required',
          'address' => 'required',
        ]);

        // Photo Upload
        $image1=$request->image1;
        $image2=$request->image2;
        $image3=$request->image3;
        $image4=$request->image4;
        $location="images/".$request->sportvenuevendor_id."/sportvenue/";
        File::makeDirectory($location, 0777, true, true);
        if ($image1) {
          $imageName1=$image1->getClientOriginalName();
          $image1->move($location, $imageName1);
          $sportvenue->image1 = $imageName1;
        }
        if ($image2) {
          $imageName2=$image2->getClientOriginalName();
          $image2->move($location, $imageName2);
          $sportvenue->image2 = $imageName2;
        }
        if ($image3) {
          $imageName3=$image3->getClientOriginalName();
          $image3->move($location, $imageName3);
          $sportvenue->image3 = $imageName3;
        }
        if ($image4) {
          $imageName4=$image4->getClientOriginalName();
          $image4->move($location, $imageName4);
          $sportvenue->image4 = $imageName4;
        }

        $sportvenue->name = $request->name;
        $sportvenue->tags = $request->tags;
        $sportvenue->sportvenuecategory_id = $request->sportvenuecategory_id;
        $sportvenue->sportvenuevendor_id = $request->sportvenuevendor_id;
        $sportvenue->province_id = $request->province_id;
        $sportvenue->regency_id = $request->regency_id;
        $sportvenue->district_id = $request->district_id;
        $sportvenue->official = $request->official;
        $sportvenue->save();

        $description = $sportvenue->sportvenuedescription;
        $description->lat = $request->lat;
        $description->lng = $request->lng;
        $description->address = $request->address;
        $description->save();

        return redirect('/admin/sportvenue');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SportVenue::find($id)->delete();

        return redirect('/admin/sportvenue');
    }
}
