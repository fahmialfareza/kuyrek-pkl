<?php

namespace App\Http\Controllers;

use App\SportVenueReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SportVenue;

class SportVenueReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
      $i = 0;
      $sportvenue = SportVenue::find($id);

      if (Auth::check()) {
        if (Auth::user()->id == $sportvenue->sportvenuevendor->user_id) {
          return back()->with('status1', 'Anda tidak bisa mereview tim Anda sendiri!');
        } else {
          $formInput = $request->all();

          $this->validate($request, [
            'star' => 'required',
            'review' => 'required',
          ]);

          $formInput['sportvenue_id'] = $id;
          $formInput['user_id'] = Auth::user()->id;

          SportVenueReview::create($formInput);

          foreach ($sportvenue->sportvenuereviews as $review) {
            $i += $review->star;
          }

          $sportvenue->star = $i / $sportvenue->sportvenuereviews->count();
          $sportvenue->save();

          return back()->with('status', 'Review telah ditambahkan!');
        }
      } else {
        return back()->with('status1', 'Anda harus login terlebih dahulu!');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SportVenueReview  $sportVenueReview
     * @return \Illuminate\Http\Response
     */
    public function show(SportVenueReview $sportVenueReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SportVenueReview  $sportVenueReview
     * @return \Illuminate\Http\Response
     */
    public function edit(SportVenueReview $sportVenueReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SportVenueReview  $sportVenueReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SportVenueReview $sportVenueReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SportVenueReview  $sportVenueReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(SportVenueReview $sportVenueReview)
    {
        //
    }
}
