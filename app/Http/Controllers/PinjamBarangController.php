<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PinjamBarang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PinjamBarangController extends Controller
{

    public function index()
    {
        $pageTitle = 'Riwayat Transaksi';
        $user = Auth::user();
        $data = null;
    
    if ($user->level=='admin') {
        $data = PinjamBarang::all();
    } elseif ($user->level=='mahasiswa') {
        $data = PinjamBarang::where('user_id', $user->id)->get();
    }

        return view('content.peminjaman.pinjam-show', compact('pageTitle', 'data'));
    }

    public function create()
    {
        $pageTitle = 'Pinjam Barang';
        $user = Auth::user();
        $barang = Barang::get();

        return view('content.peminjaman.pinjam-create',['pageTitle' => $pageTitle],compact('barang','user'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'barang' => 'required|exists:barangs,id',
            'stok' => 'required|numeric|min:1',
        ]);

        $barang = Barang::find($validatedData['barang']);

        // Cek jika stok barang cukup
        if ($barang->stok < $validatedData['stok']) {
            return redirect()->back()->with('error', 'Stok barang tidak mencukupi.');
        }

        // Cek jika status barang sudah "Habis"
        if ($barang->status === 'Habis') {
            return redirect()->back()->with('error', 'Barang tidak tersedia untuk dipinjam.');
        }

        $peminjamanBarang = new PinjamBarang;
        $peminjamanBarang->jumlah_barang = $validatedData['stok'];
        $peminjamanBarang->user_id = auth()->user()->id;
        $peminjamanBarang->barang_id = $validatedData['barang'];
        $peminjamanBarang->save();

        // Mengurangi stok barang
        $barang->stok -= $validatedData['stok'];

        // Mengubah status barang menjadi "Habis" jika stok habis
        if ($barang->stok <= 0) {
            $barang->status = 'Habis';
        }

        $barang->save();

        return redirect()->route('pinjam.index')->with('success', 'Barang berhasil dipinjam.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $user = User::find($id);

        $pageTitle = 'Detail Peminjaman';
        $data = PinjamBarang::where('user_id', $user->id)->get();

        return view('content.peminjaman.pinjam-view', compact('pageTitle', 'data', 'user'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peminjamanBarang = PinjamBarang::findOrFail($id);
        
        $barang = Barang::find($peminjamanBarang->barang_id);
        $barang->stok += $peminjamanBarang->jumlah_barang;
        $barang->status = 'Tersedia';
        $barang->save();

        $peminjamanBarang->delete();

        return redirect()->route('pinjam.index')->with('success', 'Barang berhasil dikembalikan.');
    }
}
