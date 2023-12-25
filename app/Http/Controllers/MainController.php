<?php

namespace App\Http\Controllers;

use App\Models\Stuff;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\addStuffRequest;

class MainController extends Controller
{
    public function index(){
        $stuff = Stuff::where('users_id', Auth::user()->id)->get();
        $kode = Stuff::all();
        return view('dreamstuff',compact('stuff','kode'));
    }
    public function addStuff(addStuffRequest $request){
        $imageName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = $request->nama_barang . '.' . $extension;
            $request->file('image')->storeAs('photo', $imageName);
        }
        Stuff::create([
            'kode_barang' => Str::random(7),
            'nama_barang' => $request->nama_barang,
            'image' => $imageName,
            'harga' => $request->harga,
            'uang_masuk' => 0,
            'uang_keluar' => 0,
            'uang_terkumpul' => 0,
            'users_id' => Auth::user()->id
        ]);
        return redirect()->back()->with('message','barang berhasil ditambahkan...');
    }
    public function deleteStuff($kode){
        $stuff = Stuff::with('user')->where('kode_barang', $kode)->firstOrFail()->delete();
        return redirect()->back()->with('message','barang berhasil dihapus...');
    }
    public function tambahPemasukan(Request $request, $kode){
        $stuff = Stuff::where('kode_barang',$kode)->firstOrFail();
        $stuff->uang_terkumpul += $request->uang_masuk;
        $stuff->save();
        if($stuff->uang_terkumpul >= $stuff->harga){
            Stuff::where('kode_barang',$kode)->firstOrFail()->delete();
            return redirect('/')->with('message','barang anda sudah tercapai...');
        }
        return redirect('/');
    }
    public function addPemasukan($kode){
        $stuff = Stuff::where('kode_barang',$kode)->firstOrFail();
        return view('pemasukan', compact('stuff'));
    }
    public function kurangPemasukan($kode){
        $stuff = Stuff::where('kode_barang',$kode)->firstOrFail();
        return view('pengeluaran', compact('stuff'));
    }
    public function minusPemasukan(Request $request, $kode){
        $stuff = Stuff::where('kode_barang',$kode)->firstOrFail();
        $stuff->uang_terkumpul -= $request->uang_keluar;
        $stuff->save();
        return redirect('/');
    }
}
