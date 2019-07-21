<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App;
use Lang;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request) {
      $request->session()->put('locale', $request->locale);

      // if (Auth::check()) {
      //   $user=Auth::user();
      //   $user->locale = $request->locale;
      //   $user->save();
      // }

      $request->session()->flash('alert-success', ('app.Locale_Change_Success'));
      return back();
    }
}
