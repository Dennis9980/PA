<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Kebersihan as ModelKebersihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Kebersihan extends Component
{
    public $data;
    public $penghuni;
    public $keyword;
    public $penghuni_input;
    public $dana;
    public $keterangan;
    public $tanggal_kebersihan;

    protected $rules = [
        'penghuni_input' => ['required'],
        'dana' => ['required'],
        'keterangan' => ['required'],
        'tanggal_kebersihan' => ['required'],
    ];
    
    public function mount($data, $penghuni, $keyword){
        $this->data = $data;
        $this->penghuni = $penghuni;
        $this->keyword = $keyword;
    }
    public function render()
    {

        return view('livewire.dataKebersihan');
    }

    public function store()
    {
        $this->validate();

        $pelanggan = User::where('name', $this->penghuni_input)->first();

        ModelKebersihan::create([
            'id_penghuni' => $pelanggan->id,
            'dana_kebersihan' => $this->dana,
            'keterangan' => $this->keterangan,
            'tanggal_kebersihan' => $this->tanggal_kebersihan,
        ]);
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
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dataKebersihan = Kebersihan::findOrfail($id);
        $pelanggan = User::where('name', $request->penghuni)->first();

        $dataKebersihan->update([
            'id_penghuni' => $pelanggan->id,
            'dana_kebersihan' => $request->dana,
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
