@extends("/admin/layouts/app")

@section('title',"Update Score")

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Update Score | {{ $model->M_tim_kandang->nama }} VS {{ $model->M_tim_tandang->nama }}
        </div>
        <div class="card-body">

            <form action="/admin/master/save/score/{{ $model->id }}" method="post">
                @csrf

            <div class="row">
                <div class="col-md-5">
                    <h4 class="text-center" > Tim Kandang  {{ $model->M_tim_kandang->nama }} </h4>
                    <div class="text-center" >
                        <img src="{{ asset("assets/logo_tim/")."/".$model->M_tim_kandang->logo }}" class="img-fluid" width="20%" alt="...">
                    </div>
                    <div class="form-group text-center">
                        <label for="score_tim_kandang"> Score</label>
                        <center>
                        <input type="text" style="width: 50px !important" class="form-control text-center" id="score_tim_kandang" name="score_tim_kandang" required >
                        </center>
                    </div>

                    <div class="score_kandang">

                    </div>

                </div>
                <div class="col-md-2 text-center">
                    <h1 class="text-center"  >VS</h1>
                    <a href="#" class="btn btn-info " id="update" > Update </a>
                </div>
                <div class="col-md-5">
                    <h4 class="text-center" > Tim Tandang  {{ $model->M_tim_tandang->nama }} </h4>
                    <div class="text-center" >
                        <img src="{{ asset("assets/logo_tim/")."/".$model->M_tim_tandang->logo }}" class="img-fluid" width="20%" alt="...">
                    </div>
                    <div class="form-group text-center">
                        <label for="score_tim_tandang"> Score</label>
                        <center>
                        <input type="text" style="width: 50px !important" class="form-control text-center" id="score_tim_tandang" name="score_tim_tandang" required >
                        </center>
                    </div>
                    <div class="score_tandang">

                    </div>
                </div>
            </div>

            

            <button class="btn btn-primary" style="width: 100% !important" >Simpan</button>
            </form>

        </div>
    </div>



@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
        $('#update').click(function(){
            let score_kandang = $("#score_tim_kandang").val();
            let score_tandang = $("#score_tim_tandang").val();
            console.log("kandang:" + score_kandang);
            console.log("tandang:" + score_tandang);
            let kandang = '';
            let tandang = '';
            for(let i = 1;i<=score_kandang;i++){
                kandang += `
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="nama_pemain_${i}" class="col-sm-2 col-form-label">Goal ke-${i}</label>
                            <select  name="nama_pemain[]" id="nama_pemain_${i}" style="width: 100%" class="form-control nama_pemain_kandang" required>
                             </select>
                            </div>
                        </div>  
                
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Waktu" class="col-sm-2 col-form-label">Waktu</label>
                      
                            <input type="number"  class="form-control" id="Waktu" name="waktu[]">
                            </div>
                        </div>  
                    </div>
                </div> 

                ` 
            };
            for(let i = 1;i<=score_tandang;i++){
                tandang += `
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="nama_pemain_tandang_${i}" class="col-sm-2 col-form-label">Goal ke-${i}</label>
                        
                            <select  name="nama_pemain[]" id="nama_pemain_tandang_${i}" style="width: 100%" class="form-control nama_pemain_tandang" required>
                             </select>
                            </div>
                        </div>  
                
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Waktu_tandang" class="col-sm-2 col-form-label">Waktu</label>
                      
                            <input type="number"  class="form-control" id="Waktu_tandang" name="waktu[]">
                            </div>
                        </div>  
                    </div>
                </div> 

                ` 
            }
            $('.score_kandang').html(kandang);
            $('.score_tandang').html(tandang);

            $('.nama_pemain_kandang').select2({               
                placeholder: 'Nama Pemain...',
                ajax: {
                    url: '/select2/nama_pemain/{{$model->M_tim_kandang->id}}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.nama,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            $('.nama_pemain_tandang').select2({               
                placeholder: 'Nama Pemain...',
                ajax: {
                    url: '/select2/nama_pemain/{{$model->M_tim_tandang->id}}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.nama,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

        });
    </script>


@endsection