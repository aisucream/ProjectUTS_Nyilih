<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    
    public function create()
    {
        $pageTitle = 'Tambah Barang';
        $db = Ruangan::get();

        return view('admin.create', ['pageTitle' => $pageTitle],compact('db'));
    }

    public function store(Request $request)
    {
        $messages = [
        'required' => 'Attribute harus diisi.',
        'numeric' => 'Isi :attribute dengan angka',
        'unique' => 'Nama barang sudah ada dalam database.'
        ];
        $validator = Validator::make($request->all(),[
            'nama' => 'required|unique:barangs,nama_barang',
            'stok' => 'required|numeric',
            'ruangan' => 'required',
            
        ],$messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
            // INSERT QUERY
        Barang::create([
            'nama_barang' => $request->nama,
            'stok' => $request->stok,
            'kode_ruangan' => $request->ruangan,
        ]);
       

        return redirect()->route('barang')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Detail Barang';

        $data = Barang::findOrFail($id);

        return view('admin.view', compact('pageTitle', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit barang';

        $Barang = Barang::findOrFail($id);
        $Ruangan = Ruangan::all();
        
        return view('admin.update', compact('pageTitle', 'Barang','Ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
        'required' => 'Attribute harus diisi.',
        'numeric' => 'Isi :attribute dengan angka',
        ];
        $validator = Validator::make($request->all(),[
            'stok' => 'required|numeric',
            'ruangan' => 'required',
        ],$messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $barang = Barang::findOrFail($id);
        $barang->stok = $request->stok;
        $barang->kode_ruangan = $request->ruangan;
        $barang->save();

        return redirect()->route('barang')->with('success', 'Barang berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Barang::findOrFail($id)->delete();
        return redirect()->route('barang');
    }


}
