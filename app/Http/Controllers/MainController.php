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
        $stuff = Stuff::with('user')->where('users_id', Auth::user()->id)->get();
        return view('dreamstuff',compact('stuff'));
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
        return redirect()->back();
    }
    public function deleteStuff($kode){
        Stuff::where('kode_barang', $kode)->firstOrFail()->delete();
        return redirect()->back();
    }
    public function tambahPemasukan(Request $request, $kode){
        $uang_terkumpul = Stuff::with('user')->where('kode_barang',$kode)->get('uang_terkumpul');
        $uang_terkumpul += $request->uang_masuk;
        $stuff = Stuff::where('kode_barang',$kode)->firstOrFail();
        $stuff->uang_terkumpul = $uang_terkumpul;
        $stuff->save();
        return redirect()->back();
    }
}
