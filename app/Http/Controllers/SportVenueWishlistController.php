<?php

namespace App\Http\Controllers;

use App\SportVenueWishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SportVenueWishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $wishlists = $user->sportvenuewishlists;

        return view('home.venuewishlist', compact('wishlists'));
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
    public function store($id)
    {
        $user = Auth::user();

        if (SportVenueWishlist::where('user_id', $user->id)->where('sportvenue_id', $id)->exists()) {
          return redirect('/home/venuewishlist');
        } else {
          SportVenueWishlist::create([
            'user_id' => $user->id,
            'sportvenue_id' => $id,
          ]);
        }

        return redirect('/home/venuewishlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SportVenueWishlist  $sportVenueWishlist
     * @return \Illuminate\Http\Response
     */
    public function show(SportVenueWishlist $sportVenueWishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SportVenueWishlist  $sportVenueWishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(SportVenueWishlist $sportVenueWishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SportVenueWishlist  $sportVenueWishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SportVenueWishlist $sportVenueWishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SportVenueWishlist  $sportVenueWishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist = SportVenueWishlist::find($id);

        if ($wishlist->user_id == Auth::user()->id) {
          $wishlist->delete();

          return redirect('/home/venuewishlist')->with('status', 'Berhasil menghapus wishlish!');
        } else {
          return back();
        }
    }
}
