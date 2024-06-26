<?php

namespace App\Http\Controllers;

use App\Models\KamarKos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kebersihan;
use App\Models\Laundry;

class DashboardController extends Controller
{
    public function index(){
        $data = KamarKos::doesntHave('penghuni')->get(); 
        $dataLaundry = Laundry::count();
        $dataKebersihan = Kebersihan::count();
        return view('admin.home', compact('data', 'dataLaundry', 'dataKebersihan'));
    }
}
