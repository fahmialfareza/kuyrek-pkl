<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App;
use App\SportVenueBooking;

class PDFController extends Controller
{
    public function booking_invoice($id) {
      $booking = SportVenueBooking::find($id);
      $pdf = App::make('dompdf.wrapper');
      $pdf->setPaper('A4', 'landscape');
      $pdf = PDF::loadView('pdf.booking', compact('booking'));
      return $pdf->stream('invoice-#' . $booking->id . '.pdf');
    }
}
