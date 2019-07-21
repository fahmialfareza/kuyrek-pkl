<?php

namespace App\Http\Controllers;

use App\SportVenuePrice;
use Illuminate\Http\Request;

class SportVenuePriceController extends Controller
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
    public function create($id)
    {
        return view('admin.sportvenue.price.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $formInput = $request->all();

        $formInput['sportvenue_id'] = $request->id;

        $this->validate($request, [
          'from_day' => 'required',
          'to_day' => 'required',
          'start_time' => 'required',
          'end_time' => 'required',
          'price' => 'required',
        ]);

        SportVenuePrice::create($formInput);

        return redirect('/admin/sportvenue');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SportVenuePrice  $sportVenuePrice
     * @return \Illuminate\Http\Response
     */
    public function show(SportVenuePrice $sportVenuePrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SportVenuePrice  $sportVenuePrice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price = SportVenuePrice::find($id);

        return view('admin.sportvenue.price.edit', compact('price', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SportVenuePrice  $sportVenuePrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sportvenue = SportVenuePrice::find($id);

        $this->validate($request, [
          'from_day' => 'required',
          'to_day' => 'required',
          'start_time' => 'required',
          'end_time' => 'required',
          'price' => 'required',
        ]);

        $sportvenue->from_day = $request->from_day;
        $sportvenue->to_day = $request->to_day;
        $sportvenue->start_time = $request->start_time;
        $sportvenue->end_time = $request->end_time;
        $sportvenue->price = $request->price;
        $sportvenue->save();

        return redirect('/admin/sportvenue');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SportVenuePrice  $sportVenuePrice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SportVenuePrice::find($id)->delete();

        return redirect('/admin/sportvenue');
    }
}
