<?php

namespace App\Http\Controllers;

use App\M_score;
use App\M_tanding;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TandingCT extends Controller
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
            return Datatables::of(M_tanding::query())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                if($row->status == 2){
                    return '<div class="form-button-action">
                    <a href="/admin/master/score/'. $row->id . '" class="btn btn-link btn-success"><i class="fa fa-flag"></i></a>
                    </div>';
                }else{
                    return '<div class="form-button-action">
                    <a href="/admin/master/tanding/'. $row->id . '/edit" class="btn btn-link btn-info"><i class="fa fa-edit"></i></a>
                    <a href="/admin/master/update/score/'. $row->id . '" class="btn btn-link btn-info"><i class="fa fa-flag"></i></a>
                    </div>';

                }
            })
            ->addColumn('tim_kandang',function($row){
                return '<span>'. $row->M_tim_kandang->nama.' ('. $row->score_tim_kandang. ')'  .'</span>';
            })
            ->addColumn('vs',function($row){
                return '<p class="text-center" > VS </p>';
            })
            ->addColumn('tim_tandang',function($row){
                return '<span>'.' ('. $row->score_tim_tandang. ') ' . $row->M_tim_tandang->nama .'</span>';
            })
            ->addColumn('tanggal',function($row){
                return '<span>'. $row->tanggal .'</span>';
            })
            ->addColumn('waktu',function($row){
                return '<span>'. $row->waktu .'</span>';
            })
            ->addColumn('status', function($row){
                if($row->status == 0){
                    return '<span class="badge badge-info">Tidak Aktif</span>';
                }else if($row->status == 1){
                    return '<span class="badge badge-primary">Aktif</span>';
                }else if($row->status == 2){
                    return '<span class="badge badge-success">Selesai</span>';
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
            ->rawColumns(['tanggal','status','tim_kandang','waktu','tim_tandang','vs','action'])
            ->make(true);
        }

        $model['base_url'] = url()->current();

        
        return view("admin/tanding/index",compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
 

        return view("admin/tanding/create");
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



        $model = new M_tanding;
        $model->tim_kandang = $request->tim_kandang;
        $model->tim_tandang = $request->tim_tandang;
        $model->tanggal = $request->tanggal;
        $model->waktu = $request->waktu;
        $model->save();

        Alert::success('Tambah Data Berhasil', 'Tambah Data Tanding Berhasil');
        return redirect("/admin/master/tanding");

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
        
        $model= M_tanding::find($id);
        return view("admin/tanding/edit",compact('model'));
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
        

        $model = M_tanding::find($id);
        $model->tim_kandang = $request->tim_kandang;
        $model->tim_tandang = $request->tim_tandang;
        $model->tanggal = $request->tanggal;
        $model->waktu = $request->waktu;
        $model->save();

        Alert::success('Edit Data Berhasil', 'Edit Data Tanding Berhasil');
        return redirect("/admin/master/tanding");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function update_score($id){
        $model = M_tanding::find($id);
        return view("admin/tanding/update_score",compact('model'));
    }

    public function save_score(Request $request,$id){

     
        $model = M_tanding::find($id);
        $model->score_tim_kandang = $request->score_tim_kandang;
        $model->score_tim_tandang = $request->score_tim_tandang;
        $model->status = 2;
        $model->save();

        for ($i=0; $i <  count($request->nama_pemain); $i++) { 
           $model = new M_score;
           $model->id_tanding = $id;
           $model->id_pemain = $request->nama_pemain[$i];
           $model->waktu = $request->waktu[$i];
           $model->save();
        }
        Alert::success('Edit Data Berhasil', 'Edit Data Tanding Berhasil');
        return redirect("/admin/master/tanding");
    }

    public function score($id){
        $model = M_tanding::find($id);
        return view("admin/tanding/score",compact('model'));
    }
}
