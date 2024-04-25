<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    public function index(){
        return view('layouts.dataPenghuni.datapenghuni', [
            'data' => User::filter(['role' => 'penghuni'])->paginate(4)->withQueryString()
        ]);
    }
}
