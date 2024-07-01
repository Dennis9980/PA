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
    public function index(Request $request)
    {
        $data = Kebersihan::with('user')
            ->search($request->input('keyword'))
            ->get();
        $dataPenghuni = User::filter(['role' => 'penghuni'])->get();

        return view('layouts.kebersihan.dataKebersihan', [
            'data' => $data,
            'penghuni' => $dataPenghuni,
            'keyword' => $request->input('keyword')
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
            'keterangan' => ['required'],
            'tanggal_kebersihan' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pelanggan = User::where('name', $request->penghuni)->first();

        Kebersihan::create([
            'id_penghuni' => $pelanggan->id,
            'keterangan' => $request->keterangan,
            'tanggal_kebersihan' => $request->tanggal_kebersihan,
            'status_kebersihan' => 'belum',
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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'penghuni' => ['required'],
            'dana' => ['required'],
            'keterangan' => ['required'],
            'tanggal_kebersihan' => ['required'],
            'status_kebersihan' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dataKebersihan = Kebersihan::findOrfail($id);
        $pelanggan = User::where('name', $request->penghuni)->first();

        $nominal = preg_replace('/\D/', '', $request->dana);
        $nominal = intval($nominal);
        $dataKebersihan->update([
            'id_penghuni' => $pelanggan->id,
            'dana_kebersihan' => $nominal,
            'keterangan' => $request->keterangan,
            'tanggal_kebersihan' => $request->tanggal_kebersihan,
        ]);

        return back()->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kebersihan::findOrFail($id)->delete();

        return back()->with('success', 'Berhasil menghapus data');
    }
}
