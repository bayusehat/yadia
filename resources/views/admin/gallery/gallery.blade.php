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
                    <a href="{{ url('admin/gallery/create') }}" id="btnAddAdmin" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                </div>
            </div>
        <hr>
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped nowrap" style="width:100%" id="tableData">
                    <thead>
                       <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>File</th>
                            <th>Created</th>
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
        $('#btnAddAdmin').click(function(){
            $('#modalAdmin').modal('show');
            $('#update').hide();
            $('#cancel').hide();
            $('#modalTitle').text('Tambah Admin');
            $('small').text('');
            $('#adminPassword').attr('disabled',false);
        })
    });

    function batal(){
        $('#adminPassword').attr('disabled',false);
        $('#cancel').hide();
        $('#update').hide();
        $('form').trigger('reset');
        $('#insert').show();
        $('small').text('');
    }

    function btnToUpdate(){
        $('#modalAdmin').modal('show')
        $('small').text('');
        $('#insert').hide();
        $('#update').show();
        $('#cancel').show();
    }
    
    function loadData(){
        $('#tableData').DataTable({
            asynchronous: true,
            processing: true, 
            destroy: true,
            ajax: {
                url: "{{ url('admin/gallery/load') }}",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'GET'
            },
            columns: [
                { name: 'galleryId', searchable: false, orderable: true, className: 'text-center' },
                { name: 'galleryTitle' },
                { name: 'galleryfile', className: 'text-center'},
                { name: 'galleryCreate'},
                { name: 'action', searchable: false, orderable: false, className: 'text-center' }
            ],
            order: [[0, 'asc']],
            iDisplayInLength: 10 
        });
    }

    function deleteData(id){
        $.ajax({
            url : '{{ url("admin/gallery/delete") }}/'+id,
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