@extends("/admin/layouts/app")

@section('title',"Edit Pemain")

@section('content')
<div class="card">
    <div class="card-header">
        Edit Pemain {{ $model['data']->nama }}
    </div>
    <div class="card-body">
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>    
          <strong>{{ $message }}</strong>
        </div>
      @endif
        <form action="/admin/master/pemain/tim/update/{{ $model['data']->id }}" enctype="multipart/form-data" id="EditPemainTim" method="post">
            @csrf

            <div class="form-group">
                <label for="nama_tim">Nama Tim</label>
                <input type="text" class="form-control"  value="{{ $model['data']->M_tim->nama }}" readonly required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Pemain</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $model['data']->nama }}" required>
            </div>
            <div class="form-group">
                <label for="nomer_punggung">Nomer Punggung Pemain</label>
                <input type="number" class="form-control" id="nomer_punggung" name="nomer_punggung" value="{{ $model['data']->nomer_punggung }}" required>
            </div>
            <div class="form-group">
                <label for="tinggi_badan">Tinggi Badan Pemain <small>(*cm)</small></label>
                <input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" value="{{ $model['data']->tinggi_badan }}" required>
            </div>
            <div class="form-group">
                <label for="berat_badan">Berat Badan Pemain <small>(*kg)</small></label>
                <input type="number" class="form-control" id="berat_badan" name="berat_badan" value="{{ $model['data']->berat_badan }}" required>
            </div>
            <div class="form-group">
                <label for="posisi">Posisi Pemain </label>
                <select required name="posisi" id="posisi" class="form-control">
                    @foreach ($model['posisi'] as $item)
                        <option {{ ($model['data']->posisi == $item->id) ? "selected" : "" }} value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="separator-solid"></div>
            <div class="form-group form-show-validation row">
                <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Upload foto Pemain ( Max File : 2MB ) <span class="required-label">*</span></label>
                <div class="col-lg-4 col-md-9 col-sm-8">
                    <div class="input-file input-file-image">
                        <small> <a target="_blank" href="{{ asset("assets/pemain/")."/".$model['data']->foto }}"><i class="fa fa-eye" ></i>Lihat Foto Sebelumnya</a> </small>
                        <img class="img-upload-preview " width="200" height="200" src="http://placehold.it/100x100" alt="preview">
                        <input type="file" class="form-control form-control-file" id="foto" name="foto" accept="image/*"  >
                        <label for="foto" class="btn btn-primary btn-round btn-lg"><i class="fa fa-file-image"></i> Upload a foto Pemain</label>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" type="submit" > <i class="fa fa-save mr-1" ></i> Edit Data Pemain</button>

        </form>

    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>

<script>
    $("#EditPemainTim").validate();
</script>
@endsection