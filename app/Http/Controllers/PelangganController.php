<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
class PelangganController extends Controller
{
    public function reguler(){
        $pelanggan = Pelanggan::where('jenis','reguler')->get();
        return view('pelanggan.reguler',compact('pelanggan'));
    }
}
