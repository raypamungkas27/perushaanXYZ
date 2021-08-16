@extends("/admin/layouts/app")

@section('title',"Pemain Tim ".$model['tim']->nama )

@section('content')
    
<div class="card">
    <div class="card-header">
        Pemain Tim {{ $model['tim']->nama }}
    </div>
    <div class="card-body">
        <a href="/admin/master/pemain/tim/create/{{ $model['tim']->id }}" class="btn btn-primary btn-sm" > <i class="fa fa-plus" ></i> Tambah Pemain</a>

        <div class="table-responsive">
            <table id="table_view" class="display table table-striped table-hover" >
                <thead>
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th>foto</th>
                        <th>Nomer Punggung</th>
                        <th>nama Pemain</th>
                        <th>Posisi</th>
                        <th style="width: 20%">status</th>
                        <th >
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>foto</th>
                        <th>Nomer Punggung</th>
                        <th>nama</th>
                        <th>Posisi</th>
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
        {data: 'foto', name: 'foto'},
        {data: 'nomer_punggung', name: 'nomer_punggung'},
        {data: 'nama', name: 'nama'},
        {data: 'posisi', name: 'posisi'},
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

    showDialogConfirmationAjax(null, 'Apakah anda yakin akan menghapus data?', 'Data berhasil diHapus!', '/admin/master/pemain/hapus/'+id, 'GET', table_id);
}
</script>


@endsection