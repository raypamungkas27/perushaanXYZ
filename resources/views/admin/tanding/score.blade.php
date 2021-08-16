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

            <form action="/admin/master/save/score/1" method="post">
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
                        <h4> {{ $model->score_tim_kandang }} </h4>
                        @foreach ($model->M_score as $item )

                        @if ($item->M_pemain->id_tim == $model->M_tim_kandang->id)
                            <p> {{ $item->M_pemain->nama}} - menit {{ $item->waktu }} </p>                                                            
                        @endif

                        @endforeach

                        </center>
                    </div>

                    <div class="score_kandang">

                    </div>

                </div>
                <div class="col-md-2 text-center">
                    <h1 class="text-center"  >VS</h1>
                
                </div>
                <div class="col-md-5">
                    <h4 class="text-center" > Tim Tandang  {{ $model->M_tim_tandang->nama }} </h4>
                    <div class="text-center" >
                        <img src="{{ asset("assets/logo_tim/")."/".$model->M_tim_tandang->logo }}" class="img-fluid" width="20%" alt="...">
                    </div>
                    <div class="form-group text-center">
                        <label for="score_tim_tandang"> Score</label>
                        <center>
                        <h4> {{ $model->score_tim_tandang }} </h4>
                        @foreach ($model->M_score as $item )

                        @if ($item->M_pemain->id_tim == $model->M_tim_tandang->id)
                            <p> {{ $item->M_pemain->nama}} - menit {{ $item->waktu }} </p>                                                            
                        @endif

                        @endforeach

                        </center>
                    </div>
                    <div class="score_tandang">

                    </div>
                </div>
            </div>


            </form>

        </div>
    </div>



@endsection

