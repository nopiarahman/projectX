<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\ManualOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManualOrderController extends Controller
{
    public function indexOnGoing()
    {
        $manualOrders = ManualOrder::orderBy('tanggal')->get();
        return view('manualOrder/onGoing',compact('manualOrders'));
    }
    public function create()
    {
        // $barang = Barang::all();
        return view('manualOrder/create');
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validasi = $this->validate($request,[
                'nama'=> 'required',
                'noTelp'=> 'required',
                'alamat'=> 'required',
                'kelurahan'=> 'required',
                'kecamatan'=> 'required',
                'jenis'=> 'required',
                'berat'=> 'required|integer',
                ]);
            $requestData=$request->all();
            $manualOrders = new ManualOrder();
            $manualOrders = ManualOrder::create($requestData);
            $manualOrders->save();
            DB::commit();
            return redirect('/manualorders/ongoing')->with('success','Barang Berhasil Disimpan');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('error','Gagal. Pesan Error: '.$ex->getMessage());
        }
    }
    public function edit(ManualOrder $id)
    {
        return view('manualOrder/edit',compact('id'));
    }
    public function update(Request $request, ManualOrder $id)
    {
        try {
            DB::beginTransaction();
            $validasi = $this->validate($request,[
                'nama'=> 'required',
                'noTelp'=> 'required',
                'alamat'=> 'required',
                'kelurahan'=> 'required',
                'kecamatan'=> 'required',
                'jenis'=> 'required',
                'berat'=> 'required|integer',
                ]);
            $requestData=$request->all();
            $id->update($requestData);
            DB::commit();
            return redirect('/manualorders/ongoing')->with('success','Barang Berhasil Diupdate');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('error','Gagal. Pesan Error: '.$ex->getMessage());
        }
    }
    public function destroy(ManualOrder $id)
    {
        $id->delete();
        return redirect()->back()->with('success','Order Berhasil Dihapus');
    }
}
