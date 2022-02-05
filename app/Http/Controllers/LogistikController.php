<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logistik;
use Illuminate\Support\Facades\DB;

class LogistikController extends Controller
{
    public function index(){
        $logistik = Logistik::all();
        return view ('logistik.index',compact('logistik'));
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
            Logistik::create($requestData);
            DB::commit();
            return redirect()->back()->with('success','Petugas Berhasil Disimpan');
        }  catch (\Exception $ex) {
            // dd($ex);
            DB::rollback();
            return redirect()->back()->with('error','Gagal. Pesan Error: '.$ex->getMessage());
        }
    }
    public function update(Request $request, Logistik $id){
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
            return redirect()->back()->with('success','Petugas Berhasil Disimpan');
        }  catch (\Exception $ex) {
            // dd($ex);
            DB::rollback();
            return redirect()->back()->with('error','Gagal. Pesan Error: '.$ex->getMessage());
        }
    }
    public function destroy(Logistik $id)
    {
        $id->delete();
        return redirect()->back()->with('success','Petugas Berhasil Dihapus');

    }
}
