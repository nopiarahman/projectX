<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengepul;
use Illuminate\Support\Facades\DB;

class PengepulController extends Controller
{
    public function index()
    {
        $pengepul=Pengepul::all();
        return view('pengepul.index',compact('pengepul'));
    }
    public function store(Request $request){
        try {
            DB::beginTransaction();
            $validasi = $this->validate($request,[
                'nama'=> 'required',
                'noHp' => 'required',
                ]);
            
            $requestData=$request->all();
            $requestData['status']='bertugas';
            Pengepul::create($requestData);
            DB::commit();
            return redirect()->back()->with('success','Pengepul Berhasil Disimpan');
        }  catch (\Exception $ex) {
            // dd($ex);
            DB::rollback();
            return redirect()->back()->with('error','Gagal. Pesan Error: '.$ex->getMessage());
        }
    }
    public function update(Request $request, Pengepul $id){
        try {
            DB::beginTransaction();
            $validasi = $this->validate($request,[
                'nama'=> 'required',
                'noHp' => 'required',
                ]);
            
            $requestData=$request->all();
            $requestData['status']='bertugas';
            $id->update($requestData);
            DB::commit();
            return redirect()->back()->with('success','Pengepul Berhasil Disimpan');
        }  catch (\Exception $ex) {
            // dd($ex);
            DB::rollback();
            return redirect()->back()->with('error','Gagal. Pesan Error: '.$ex->getMessage());
        }
    }
    public function destroy(Pengepul $id)
    {
        $id->delete();
        return redirect()->back()->with('success','Pengepul Berhasil Dihapus');

    }
}
