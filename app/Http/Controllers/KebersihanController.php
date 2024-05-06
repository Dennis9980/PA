<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kebersihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KebersihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kebersihan::with('user')->get();

        return view('layouts.kebersihan.dataKebersihan', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'penghuni' => ['required'],
            'berat' => ['required'],
            'harga' => ['required'],
            'tanggal_mulai' => ['required'],
            'tanggal_selesai' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pelanggan = User::where('name', $request->penghuni)->first();

        Kebersihan::create([
            'id_penghuni' => $pelanggan->id,
            'berat' => $request->berat,
            'total_harga' => $request->harga,
            'tanggal_masuk' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai
        ]);

        return back()->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kebersihan $kebersihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kebersihan $kebersihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kebersihan $kebersihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kebersihan $kebersihan)
    {
        //
    }
}
