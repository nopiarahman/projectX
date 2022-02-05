<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::all()->groupBy('jenis');
        return view ('barang.index',compact('barang'));
    }
    public function store(Request $request){
        // dd($request); 
        try {
            DB::beginTransaction();
            $validasi = $this->validate($request,[
                'sub'=> 'required',
                'harga'=> 'required|integer',
                ]);
            
            $requestData=$request->all();
            if($request->jenisLama){
                $requestData['jenis']=$request->jenisLama;
                unset($requestData['jenisLama']);
            }elseif($request->jenisBaru){
                $requestData['jenis']=$request->jenisBaru;
                unset($requestData['jenisBaru']);
            }else{
                return redirect()->back()->with('error','Gagal. Jenis barang Salah');
            }
            /* Penyimpanan gambar menggunakan Spatie media Library
                 cek doc di https://spatie.be/docs/laravel-medialibrary/v9/introduction */
            $barang = new Barang;
            $barang = Barang::create($requestData);
            if($request->hasFile('gambar')){
                $barang
                ->addMediaFromRequest('gambar')
                ->withResponsiveImages()
                ->toMediaCollection();
            }
            $barang->save();
            DB::commit();
            return redirect()->back()->with('success','Barang Berhasil Disimpan');
        }  catch (\Exception $ex) {
            // dd($ex);
            DB::rollback();
            return redirect()->back()->with('error','Gagal. Pesan Error: '.$ex->getMessage());
        }
    }
    public function cariJenisBarang(Request $request){
        if ($request->has('q')) {
    	    $cari = $request->q;
    		$data = barang::select('id', 'jenis')->where('jenis', 'LIKE', '%'.$cari.'%')->get();
    		return response()->json($data);
    	}
    }
    public function update(Request $request, Barang $id){
        // dd($request);
        try {
            DB::beginTransaction();
            $validasi = $this->validate($request,[
                'sub'                     => 'required',
                'harga'                     => 'required|integer',
                ]);
            
            $requestData=$request->all();
            $id->update($requestData);
            if($request->hasFile('gambar')){
                $id->media()->delete();
                $id->addMediaFromRequest('gambar')
                ->withResponsiveImages()
                ->toMediaCollection();

            }
            DB::commit();
            return redirect()->back()->with('success','Barang Berhasil Disimpan');
        }  catch (\Exception $ex) {
            dd($ex);
            DB::rollback();
            return redirect()->back()->with('error','Gagal. Pesan Error: '.$ex->getMessage());
        }
    }
    public function destroy(Barang $id){
        if($id->relation){
            return redirect()->back()->with('error','Gagal. Barang telah mempunyai order!');
        }
        $id->delete();
        return redirect()->back()->with('success','Barang Berhasil Dihapus');

    }
}
