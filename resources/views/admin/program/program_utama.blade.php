<section>
    <div class="card">
        <div class="card-header">
            <h1>
                {{ $title }}
            </h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xl-12 text-right">
                    <a href="{{ url('admin/progutama/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                </div>
            </div>
        <hr>
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped nowrap" style="width:100%" id="tableData">
                    <thead>
                       <tr>
                            <th>No</th>
                            <th>Icon</th>
                            <th>Judul</th>
                            <th>Action</th>
                        </tr> 
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    $(function(){
        loadData();
    });
    
    function loadData(){
        $('#tableData').DataTable({
            asynchronous: true,
            processing: true, 
            destroy: true,
            ajax: {
                url: "{{ url('admin/progutama/load') }}",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'GET'
            },
            columns: [
                { name: 'programUtamaId', searchable: false, orderable: true, className: 'text-center' },
                { name: 'programUtamaIcon', className: 'text-center' },
                { name: 'programUtamaTitle'},
                { name: 'action', searchable: false, orderable: false, className: 'text-center' }
            ],
            order: [[0, 'asc']],
            iDisplayInLength: 10 
        });
    }

    function deleteData(id){
        $.ajax({
            url : '{{ url("admin/admin/delete") }}/'+id,
            headers : {
                'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content')
            },
            dataType : 'JSON',
            success:function(res){
                if(res.status == 200){
                    $('#tableData').DataTable().ajax.reload(null, false)
                }else{
                    alert(res.result);
                }
            }
        })
    }
</script>