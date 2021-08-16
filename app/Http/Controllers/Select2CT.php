<?php

namespace App\Http\Controllers;

use App\M_kota;
use App\M_pemain;
use App\M_tim;
use Illuminate\Http\Request;

class Select2CT extends Controller
{
    
    public function kota(Request $request){
        if ($request->has('q')) {
            $cari = $request->q;
            $data = M_kota::whereRaw("(name LIKE '%".$request->get('q')."%')")
            ->limit(30)
            ->get();
            return response()->json($data);
        }
    }

    

    public function tim(Request $request){
        if ($request->has('q')) {
            $cari = $request->q;
            $data = M_tim::whereRaw("(nama LIKE '%".$request->get('q')."%')")
            ->limit(30)
            ->get();
            return response()->json($data);
        }
    }

    public function tim_tandang(Request $request,$id){
        if ($request->has('q')) {
            $cari = $request->q;
            $data = M_tim::whereRaw("(nama LIKE '%".$request->get('q')."%')")
            ->whereRaw("(nama NOT LIKE '".$request->get('q')."')")
            ->limit(30)
            ->get();
            return response()->json($data);
        }
    }

    public function nama_pemain(Request $request,$kandang){
        if ($request->has('q')) {
            $cari = $request->q;
            $data = M_pemain::whereRaw("(nama LIKE '%".$request->get('q')."%')")
            ->where("id_tim",$kandang)
            ->limit(30)
            ->get();
            return response()->json($data);
        }
    }

}
