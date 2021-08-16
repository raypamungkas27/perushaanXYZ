<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use App\M_tim;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TimCT extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            return Datatables::of(M_tim::query())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return '<div class="form-button-action">
                <a href="/admin/master/tim/'. $row->id . '/edit" class="btn btn-link btn-info"><i class="fa fa-edit"></i></a>
                </div>
                <a href="/admin/master/pemain/tim/'.$row->id.'" class="btn btn-link btn-primary"  data-toggle="Data Pemain" data-placement="top" title="Data Pemain"><i class="far fa-futbol"></i> </a>
                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus" onclick="deleteAlert('.$row->id.')"><i class="fa fa-trash"></i></button>
                ';
            })
            ->addColumn('name',function($row){
                return '<span>'. $row->name .'</span>';
            })
            ->addColumn('logo',function($row){
                return '<span> <img src=" '. asset("assets/logo_tim/")."/".$row->logo.'" width="50%" ></span>';
            })
            ->addColumn('kota',function($row){
                return '<span>'. $row->M_kota->name .'</span>';
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
            ->rawColumns(['nama','status','action','logo','kota'])
            ->make(true);
        }
        $model['base_url'] = url()->current();

        return view("admin/tim/index",compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/tim/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $model = M_tim::where("nama",$request->nama)->where("id_kota",$request->id_kota)->first();
        if ($model) {
            return redirect()->back()->with(['error' => 'Nama Tim dan Asal Kota tidak Boleh Sama!']);
        }

        $model = new M_tim;
        $model->nama = $request->nama;
        $model->tahun_berdiri = $request->tahun_berdiri;
        $model->alamat = $request->alamat;
        $model->id_kota = $request->id_kota;

        $this->validate($request, [
            'logo' => 'required|mimes:jpeg,bmp,png,jpg|max:20000'
        ]);
        $file_foto = $request->logo;
        
        $filename_foto = Str::random(20).'.'.$file_foto->getClientOriginalExtension();
        $request->logo->move('assets/logo_tim/',$filename_foto);

        $model->logo = $filename_foto;
        $model->save();

        Alert::success('Tambah Data Berhasil', 'Tambah Data Tim Berhasil');
        return redirect("/admin/master/tim");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        

        $model['data'] = M_tim::find($id);

        if ($model['data']) {
            return view("admin/tim/edit",compact('model'));
        } else {
            return redirect("/admin/master/tim");
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $model = M_tim::find($id);

        
        $model->nama = $request->nama;
        $model->tahun_berdiri = $request->tahun_berdiri;
        $model->alamat = $request->alamat;
        $model->id_kota = $request->id_kota;

        if ($request->logo) {
            $this->validate($request, [
                'logo' => 'required|mimes:jpeg,bmp,png,jpg|max:20000'
            ]);
            $file_foto = $request->logo;
            $filename_foto = Str::random(20).'.'.$file_foto->getClientOriginalExtension();
            $request->logo->move('assets/logo_tim/',$filename_foto);
    
            $model->logo = $filename_foto;
        }
        
        $model->save();

        Alert::success('Edit Data Berhasil', 'Edit Data Tim Berhasil');
        return redirect("/admin/master/tim");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tim = M_tim::find($id);
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
