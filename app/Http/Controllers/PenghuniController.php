<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Penghuni;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class PenghuniController extends Controller
{
    public function index(Request $request)
    {
        $search = request('search');

        $data = User::filter(['role' => 'penghuni', $search])
            ->search(['search' => $search])
            ->paginate(15);

        return view('layouts.dataPenghuni.datapenghuni', compact('data'));
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'username' => ['required', 'string', 'unique:' . User::class, 'max:255'],
            'phone' => ['nullable', 'string'],
            'address' => ['nullable', 'string']
        ]);

        $user = User::findOrFail($id);

        // Update the user's properties
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->address = $request->address;

        // Save the changes
        $user->save();

        $this->createDataDetail($request, $id);

        dd($request->all());
        return back()->with('success');
    }

    public function createDataDetail(Request $request, $id)
    {
        $request->validate([
            'tanggal_mulai' => ['required'],
            'tanggal_selesai' => ['required'],
        ]);

        Penghuni::create([
            'id_user' => $id,
            'id_kos' => 'kamar1',
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status_pemabayaran' => 'sudah'
        ]);
    }

    public function destroy($id)
    {

        $data = User::findOrFail($id);
        $data->delete();

        return back()->with('message', 'Berhasil Hapus Data');
    }
}
