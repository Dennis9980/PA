<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class KelolaBooking extends Controller
{
    public function index(){
        $data = Booking::paginate(5);

        return view('layouts.booking.dataBooking', compact('data'));
    }

    public function destroy($id){
        Booking::findOrFail($id)->delete();

        return redirect()->back();
    }
}
