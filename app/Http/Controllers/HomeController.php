<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PinjamBarang;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pageTitle = 'Home';

        $user = User::where('level','mahasiswa')->count();
        $barang = Barang::where('status','tersedia')->count();
        $report = Report::count();
        $pinjam = PinjamBarang::count();

        return view('home',['pageTitle' => $pageTitle],compact('barang','user','report','pinjam'));
    }

        /**
     * Display a listing of the resource.
     */
    public function halaman_barang()
    {
        $data = Barang::get();
        $pageTitle = 'Asset Barang';
        return view('barang', ['pageTitle' => $pageTitle], compact('data'));
    }


        public function halaman_report()
    {
        $pageTitle = 'Asset Barang';
        return view('report', ['pageTitle' => $pageTitle]);
    }
}
