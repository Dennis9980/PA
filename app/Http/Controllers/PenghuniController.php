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
            ->paginate(6);

        return view('layouts.penghuni.datapenghuni', compact('data'));
    }

    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string'],
            'address' => ['nullable', 'string']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user = User::findOrFail($id);

        // Update the user's properties
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        // Update atau buat data Penghuni jika role adalah 'penghuni'
        if ($user->role === 'penghuni') {
            $user->penghuni()->updateOrCreate(
                ['id_user' => $id], // Kondisi pencarian
                [
                    'id_kos' => $request->id_kos,
                    'id_kamar_kos' => $request->id_kamar_kos,
                    'tanggal_mulai' => $request->tanggal_mulai,
                    'tanggal_selesai' => $request->tanggal_selesai,
                    'status_pembayaran' => 'sudah',
                ]
            );
        }


        return back()->with('success');
    }

    public function createDataDetail(Request $request, $id)
    {


        return back()->with('success', 'berhasil nambah detail');
    }

    public function destroy($id)
    {

        $data = User::findOrFail($id);
        $data->delete();

        return back()->with('message', 'Berhasil Hapus Data');
    }
}
