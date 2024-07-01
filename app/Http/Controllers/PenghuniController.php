<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\KamarKos;
use App\Models\Penghuni;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        $dataKos = KamarKos::doesntHave('penghuni')->get();


        $data = User::filter(['role' => 'penghuni', $search])
            ->search(['search' => $search])
            ->paginate(6);

        return view('layouts.penghuni.datapenghuni', compact('data', 'dataKos'));
    }

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi unique email dan username dengan mengecualikan user yang sedang diedit
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable', 'string'],
            'terbayar' => ['required', 'integer'],
            'address' => ['nullable', 'string']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $nominal = preg_replace('/[^0-9]/', '', $request->terbayar);
        $nominal = intval($nominal);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
        ]);

        if ($user->role === 'penghuni') {
            $user->penghuni()->updateOrCreate(
                ['id_user' => $id],
                [
                    'id_kamar_kos' => $request->id_kamar_kos,
                    'tanggal_mulai' => $request->tanggal_mulai,
                    'tanggal_selesai' => $request->tanggal_selesai,
                    'terbayar' => $nominal,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]
            );
        }

        return back()->with('success', 'Data pengguna berhasil diperbarui!');
    }


    public function resetDana($id)
    {
        $data = User::findOrFail($id);
        Penghuni::where('id_user', $data->id)->update(['dana_kebersihan' => 0]);
        

        return back()->with('success', 'berhasil nambah detail');
    }

    public function destroy($id)
    {

        $data = User::findOrFail($id);
        $data->delete();

        return back()->with('message', 'Berhasil Hapus Data');
    }
}
