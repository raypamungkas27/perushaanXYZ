@extends("/admin/layouts/app")

@section('title',"Tambah Data Tim")

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Tambah Data Tim</h4>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>    
          <strong>{{ $message }}</strong>
        </div>
      @endif
        <form action="/admin/master/tim" id="addTim" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama">Nama Tim</label>
                <input type="text" class="form-control" name="nama" id="nama" required placeholder="Masukan Nama Tim">
            </div>

            <div class="form-group">
                <label for="tahun_berdiri">Tahun Berdiri Tim</label>
                <input type="number" class="form-control" name="tahun_berdiri" id="tahun_berdiri" required placeholder="Masukan Nama Tim">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat Tim</label>
                <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" required ></textarea>
            </div>

            <div class="form-group">
                <label for="id_kota"><b>Kota Markas</b></label>
                <select  name="id_kota" style="width: 100%" class="form-control id_kota" required>
                </select>
            </div>

            <div class="separator-solid"></div>
            <div class="form-group form-show-validation row">
                <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Upload Logo Image ( Max File : 2MB ) <span class="required-label">*</span></label>
                <div class="col-lg-4 col-md-9 col-sm-8">
                    <div class="input-file input-file-image">
                        <img class="img-upload-preview " width="200" height="200" src="http://placehold.it/100x100" alt="preview">
                        <input type="file" class="form-control form-control-file" id="logo" name="logo" accept="image/*" required  >
                        <label for="logo" class="btn btn-primary btn-round btn-lg"><i class="fa fa-file-image"></i> Upload a Logo Image</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary " > <i class="fa fa-save mr-1" ></i>  Simpan</button>
        </form>
    </div>
</div>

@endsection


@section('js')

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>

<script>
    $("#addTim").validate();
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $('.id_kota').select2({
 
        placeholder: 'Kota Anda...',
        ajax: {
            url: '/select2/kota',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });

</script>
@endsection