<?php

namespace App\Http\Controllers;

use App\M_pemain;
use App\M_posisi;
use App\M_tim;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class PemainCT extends Controller
{
    //

    public function pemain_tim(Request $request, $id){


        if ($request->ajax()) {
            return Datatables::of(M_pemain::where("id_tim",$id))
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return '<div class="form-button-action">
                <a href="/admin/master/pemain/tim/edit/'. $row->id . '" class="btn btn-link btn-info"><i class="fa fa-edit"></i></a>
                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus" onclick="deleteAlert('.$row->id.')"><i class="fa fa-trash"></i></button>
                </div>';
            })
            ->addColumn('foto',function($row){
                return '<span > <img  class="mt-2 mb-2" src=" '. asset("assets/pemain/")."/".$row->foto.'" width="50%" ></span>';
            })
            ->addColumn('nomer_punggung',function($row){
                return '<span>'. $row->nomer_punggung .'</span>';
            })
            ->addColumn('nama',function($row){
                return '<span>'. $row->nama .'</span>';
            })
            ->addColumn('posisi',function($row){
                return '<span>'. $row->M_posisi->nama .'</span>';
            })
            ->addColumn('status', function($row){
                if($row->status == 0){
                    return '<span class="badge badge-info">Tidak Aktif</span>';
                }else if($row->status == 1){
                    return '<span class="badge badge-success">Aktif</span>';
                }
            })
            ->filter(function ($instance) use ($request) {

                if ($request->get('status') != null) {
                    $instance->where('status', $request->get('status'));
                }
    
                if (!empty($request->get('search'))) {
                    $instance->where(function($w) use($request){
                        $search = $request->get('search');
                        $w->orWhere('file', 'LIKE', "%$search%");
                    });
                }
            })
            ->rawColumns(['nama','status',"foto","posisi","nomer_punggung",'action'])
            ->make(true);
        }

        $model['data'] = M_pemain::where("id_tim",$id)->get();
        $model['tim'] = M_tim::find($id);
        $model['base_url'] = url()->current();
        return view("admin/pemain/tim",compact('model'));
    }

    public function create($id){
        $model['tim'] = M_tim::find($id);
        $model['posisi'] = M_posisi::all();
        return view("admin/pemain/create",compact('model'));
    }

    public function save(Request $request,$id){

        $model = M_pemain::where("id_tim",$id)->where("nomer_punggung",$request->nomer_punggung)->first();
        if ($model) {
            return redirect()->back()->with(['error' => 'Nomer punggung tidak boleh sama!']);
        }

        $model = new M_pemain;
        $model->nama = $request->nama;
        $model->nomer_punggung = $request->nomer_punggung;
        $model->tinggi_badan = $request->tinggi_badan;
        $model->berat_badan = $request->berat_badan;
        $model->posisi = $request->posisi;
        $model->id_tim = $id;

        $this->validate($request, [
            'foto' => 'required|mimes:jpeg,bmp,png,jpg|max:20000'
        ]);
        $file_foto = $request->foto;
        $filename_foto = Str::random(20).'.'.$file_foto->getClientOriginalExtension();
        $request->foto->move('assets/pemain/',$filename_foto);

        $model->foto = $filename_foto;
        $model->save();

        Alert::success('Tambah Data Berhasil', 'Tambah Data Pemain Berhasil');
        return redirect("admin/master/pemain/tim/".$id);
    }

    public function edit($id){
        $model['data'] = M_pemain::find($id);
        $model['posisi'] = M_posisi::all();

        if ($model['data']) {
            return view("admin/pemain/edit",compact("model"));
        }else{
            return redirect("admin/master/pemain/tim/".$id);
        }
    }

    public function update(Request $request,$id){
    
        $model = M_pemain::where("id_tim",$id)->where("nomer_punggung",$request->nomer_punggung)->count();
        if ($model>1) {
            return redirect()->back()->with(['error' => 'Nomer punggung tidak boleh sama!']);
        }


        $model = M_pemain::find($id);
        $model->nama = $request->nama;
        $model->nomer_punggung = $request->nomer_punggung;
        $model->tinggi_badan = $request->tinggi_badan;
        $model->berat_badan = $request->berat_badan;
        $model->posisi = $request->posisi;
        $model->id_tim = $id;

        if ($request->foto) {
            $this->validate($request, [
                'foto' => 'required|mimes:jpeg,bmp,png,jpg|max:20000'
            ]);
            $file_foto = $request->foto;
            $filename_foto = Str::random(20).'.'.$file_foto->getClientOriginalExtension();
            $request->foto->move('assets/pemain/',$filename_foto);
    
            $model->foto = $filename_foto;
        }
        $model->save();
        Alert::success('Edit Data Berhasil', 'Edit Data Pemain Berhasil');
        return redirect("admin/master/pemain/tim/".$id);
    }

    public function delete($id){
        $tim = M_pemain::find($id);
        try {
            $tim->delete();
            return response()->json([
                'state' => true,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'state' => false,
            ], 500);
        }
    }
}
