@extends("/admin/layouts/app")

@section('title',"Tambah Data Tanding")
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    
<div class="card">
    <div class="card-header">
        Tambah Data Tanding
    </div>
    <div class="card-body">
        <form action="/admin/master/tanding/{{ $model->id }}" id="addTanding" method="POST" >
        @method("PUT")
        @csrf
    
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tanggal">Tanggal Tanding</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required value="{{ $model->tanggal }}" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="waktu">Waktu Tanding</label>
                    <input type="time" class="form-control" id="waktu" name="waktu" required value="{{ $model->waktu }}" >
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tim_kandang"><b>Tim Kandang</b></label>
                    <select  name="tim_kandang" style="width: 100%" class="form-control tim_kandang" required>
                        <option value="{{ $model->tim_kandang }}">{{ $model->M_tim_kandang->nama }}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tim_tandang"><b>Tim tandang</b></label>
                    <select  name="tim_tandang" style="width: 100%"  class="form-control tim_tandang" required>
                        <option value="{{ $model->tim_tandang }}">{{ $model->M_tim_tandang->nama }}</option>
                    </select>
                </div>
            </div>
        </div>

        <button class="btn btn-primary btn-sm ml-2" > <i class="fa fa-save mr-1" ></i> Simpan </button>
        </form>
        

     </div>
     </div>

</div>
@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>

<script>
    $("#addTanding").validate();
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.tim_tandang').select2();
});
</script>

<script type="text/javascript">
    $('.tim_kandang').select2({
 
        placeholder: 'Tim Kandang...',
        ajax: {
            url: '/select2/tim',
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

    $(document).ready(function(){
            $('.tim_kandang').change(function (){

            $('.tim_tandang').select2({
               placeholder: 'Tim Tandang...',
               minimumInputLength: 3,
               ajax: {
                   url: '/select2/tim_tandang/' + $('.tim_kandang').val() ,
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
                $(".tim_tandang").prop('disabled', false);

            })
        })

    
</script>
@endsection