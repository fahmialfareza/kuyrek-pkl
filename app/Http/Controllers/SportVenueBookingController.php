<?php

namespace App\Http\Controllers;

use App\SportVenueBooking;
use App\SportVenue;
use App\SportVenuePrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class SportVenueBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = SportVenueBooking::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('home.booking.mybooking', compact('bookings'));
    }

    public function bookings() {
        $bookings = SportVenueBooking::orderBy('id', 'desc')->get();

        return view('admin.sportvenue.booking', compact('bookings'));
    }

    public function confirmation($id) {
      $booking = SportVenueBooking::find($id);

      if ($booking->transfer == 0) {
        $booking->transfer = 1;
        $booking->save();
      } else {
        $booking->transfer = 0;
        $booking->save();
      }

      return redirect('/admin/sportvenue/booking');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sportvenue = SportVenue::find($request->sportvenue_id);

        $this->validate($request, [
          'sportvenue_id' => 'required',
          'date' => 'required',
          'start_time' => 'required',
          'end_time' => 'required',
        ]);

        $dt = \Carbon\Carbon::createFromFormat('Y-n-j', $request->date);
        $dt = $dt->dayOfWeek;

        $datetime = $request->date . " " . $request->start_time;

        if ($datetime <= \Carbon\Carbon::now()->addDay()) {
          return back()->with('status1', 'Tidak bisa memesan, dikarenakan minimal pemesanan adalah 1 hari sebelum olahraga');
        }

        $sportvenueprice_id;

        foreach ($sportvenue->sportvenueprices as $price) {
          if ($dt <= $price->to_day && $dt >= $price->from_day) {
            $sportvenueprice_id = $price->id;
            break;
          } else {
            return back()->with('status1', 'Tidak bisa memesan pada hari dan jam tersebut');
          }
        }

        $endtime = strtotime($request->start_time) + $request->end_time*60*60;
        $endtime = date('H:i', $endtime);

        $totalpayment = SportVenuePrice::find($sportvenueprice_id)->price * $request->end_time;

        SportVenueBooking::create([
          'user_id' => Auth::user()->id,
          'sportvenue_id' => $request->sportvenue_id,
          'sportvenueprice_id' => $sportvenueprice_id,
          'date' => $request->date,
          'start_time' => $request->start_time,
          'end_time' => $endtime,
          'total_payment' => $totalpayment,
          'expired' => \Carbon\Carbon::now()->addHours(6),
        ]);

        return redirect('/home/mybooking');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SportVenueBooking  $sportVenueBooking
     * @return \Illuminate\Http\Response
     */
    public function show(SportVenueBooking $sportVenueBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SportVenueBooking  $sportVenueBooking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $booking = SportVenueBooking::find($id);

      if (Auth::user()->id == $booking->user_id) {
        return view('home.booking.confirmation', compact('booking', 'id'));
      } else {
        return back();
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SportVenueBooking  $sportVenueBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $user = Auth::user();
      $booking = SportVenueBooking::find($id);

      if ($user->id == $booking->user_id) {
        $this->validate($request, [
          'payment' => 'required|image|mimes:png,jpg,jpeg|max:1000',
        ]);

        $image1=$request->payment;
        $location="images/".$user->id."/booking/".$id;
        File::makeDirectory($location, 0777, true, true);
        if ($image1) {
          $imageName1=$image1->getClientOriginalName();
          $image1->move($location, $imageName1);
          $booking->payment = $imageName1;
        }

        $booking->save();

        return redirect('/home/mybooking');
      } else {
        return back();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SportVenueBooking  $sportVenueBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $booking = SportVenueBooking::find($id);

      if (Auth::user()->id == $booking->user_id) {
        $booking->transfer = 0;
        $booking->expired = $booking->created_at;
        $booking->save();

        return redirect('/home/mybooking');
      } else {
        return back();
      }
    }
}
