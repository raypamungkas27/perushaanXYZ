@extends("/admin/layouts/app")

@section('title',"Data Tanding")

@section('content') 
    
<div class="card">
    <div class="card-header">
        Data Tanding
    </div>
    <div class="card-body">
        <a href="/admin/master/tanding/create" class="btn btn-primary btn-sm" > <i class="fa fa-plus mr-1" ></i> Tambah Data Tanding </a>

        <div class="table-responsive">
            <table id="table_view" class="display table table-striped table-hover" >
                <thead>
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th>Tim Kandang</th>
                        <th width=10%> </th>
                        <th>Tim Tandang</th>
                        <th>tanggal</th>
                        <th>waktu</th>
                        <th style="width: 20%">status</th>
                        <th >
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tim Kandang</th>
                        <th width=10%></th>
                        <th>Tim Tandang</th>
                        <th>tanggal</th>
                        <th>waktu</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    var base_endpoint = "{{$model['base_url']}}";
    var table_id = '#table_view';
var table = null;

$(document).ready(function() {

    var table = $(table_id).DataTable({
        processing: true,
        serverSide: true,
        order: [[ 3, "asc" ]],
        ajax: {
            url: base_endpoint,
            data: function (d) {
                d.status = $('#status').val(),
                d.search = $('input[type="search"]').val()
            }
        },
        columns: [
        {data: 'id', name: 'id', render : function(data, type, full, meta) {
            return '<strong class=" col-red" style="font-size: 12px">'+(meta.row+1)+'</strong>';
        }},
        {data: 'tim_kandang', name: 'tim_kandang'},
        {data: 'vs', name: 'vs'},
        {data: 'tim_tandang', name: 'tim_tandang'},
        {data: 'tanggal', name: 'tanggal'},
        {data: 'waktu', name: 'waktu'},

        {data: 'status', name: 'status'},
        {data: 'action', name: 'action'}
        ]
    });

    $('#kategori_filter').change(function(){
        table.draw();
    });

    $('#status').change(function(){
        table.draw();
    });

});

function deleteAlert(id) {
    var body = {
        "id": id,
        "_token": token,
    }
    showDialogConfirmationAjax(null, 'Apakah anda yakin akan menghapus data?', 'Data berhasil diHapus!', base_endpoint+'/'+id, 'DELETE', body, table_id);
}
</script>
@endsection