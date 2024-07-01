<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Laundry;
use App\Models\Penghuni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LaundryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $data = Laundry::with('user')
            ->search($request->input('keyword'))
            ->paginate(6);
        $dataPenghuni = User::filter(['role' => 'penghuni'])->get();

        return view('layouts.laundry.dataLaundry', [
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
            'berat' => ['required'],
            'harga' => ['required'],
            'tanggal_mulai' => ['required'],
            'tanggal_selesai' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $penghuni = User::where('name', $request->penghuni)->first();
        $nominal = preg_replace('/\D/', '', $request->harga);
        $nominal = intval($nominal);
        Laundry::create([
            'id_penghuni' => $penghuni->id,
            'berat' => $request->berat,
            'total_harga' => $nominal,
            'tanggal_masuk' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai
        ]);
        
        $updateSaldo = Penghuni::where('id_user', $penghuni->id)->first();
        $updateSaldo->saldo_laundry -= $nominal;
        $updateSaldo->save();


        return back()->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laundry $laundry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'penghuni' => ['required'],
            'berat' => ['required', 'numeric'],
            'harga' => ['required', 'numeric'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $laundry = Laundry::findOrFail($id);
        $pelanggan = User::where('name', $request->penghuni)->first();

        $nominal = preg_replace('/\D/', '', $request->harga);
        $nominal = intval($nominal);
        $laundry->update([
            'id_penghuni' => $pelanggan->id,
            'berat' => $request->berat,
            'total_harga' => $nominal,
            'tanggal_masuk' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai
        ]);

        return redirect()->back()->with('success', 'Laundry updated successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laundry $laundry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Laundry::findOrFail($id)->delete();

        return back()->with('success', 'berhasil menghapus data laundry');
    }
}
