<?php

namespace App\Http\Controllers;


use App\Models\Report;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Report';
        $data = Report::has('user')->with('user')->get();
        return view('admin.report.table-report', compact('pageTitle', 'data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Reporting';

        return view('content.report', compact('pageTitle'));     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
                'required' => 'Attribute harus diisi.',
                'keterangan.max' => 'Keterangan tidak boleh melebihi :max karakter.'
            ];

            $validator = Validator::make($request->all(), [
                'jenis' => 'required|in:Bug Aplikasi,Keluhan,Kualitas Barang',
                'keterangan' => 'required|max:100',
            ], $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // INSERT QUERY
            Report::create([
                'jenis_report' => $request->jenis,
                'keterangan' => $request->keterangan,
                'user_report' => Auth::id(), // Menggunakan user_id dari pengguna yang sedang login
            ]);
            
            return redirect()->route('home')->with('success', 'Laporan diterima!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
