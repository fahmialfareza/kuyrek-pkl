<?php

namespace App\Http\Controllers;

use App\SportVenueCategory;
use Illuminate\Http\Request;

class SportVenueCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = SportVenueCategory::all();
        return view('admin.sportvenue.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sportvenue.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->all();

        $this->validate($request, [
          'name' => 'required',
        ]);

        SportVenueCategory::create($formInput);

        return redirect('/admin/sportvenue/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SportVenueCategory  $sportVenueCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SportVenueCategory $sportVenueCategory)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SportVenueCategory  $sportVenueCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $category = SportVenueCategory::find($id);

      return view('admin.sportvenue.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SportVenueCategory  $sportVenueCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = SportVenueCategory::find($id);

        $this->validate($request, [
          'name' => 'required',
        ]);

        $category->name = $request->name;
        $category->save();

        return redirect('/admin/sportvenue/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SportVenueCategory  $sportVenueCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SportVenueCategory::find($id)->delete();

        return redirect('/admin/sportvenue/category');
    }
}
