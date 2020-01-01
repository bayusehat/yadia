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
                    <a href="javascript:void(0)" id="btnAddMenu" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                </div>
            </div>
        <hr>
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped nowrap" style="width:100%" id="tableData">
                    <thead>
                       <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>URL</th>
                            <th>Parent</th>
                            <th>Action</th>
                        </tr> 
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<form id="formMenu">
    @csrf
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenu" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xl-6">
                    <div class="form-group">
                        <label for="menuName">Nama Menu</label>
                        <input type="text" class="form-control" name="menuName" id="menuName">
                        <small class="text-danger" id="valid_menuName"></small>
                    </div>
                    <div class="form-group">
                        <label for="menuUrl">URL Menu</label>
                        <input type="text" class="form-control" name="menuUrl" id="menuUrl">
                        <small class="text-danger" id="valid_menuUrl"></small>
                    </div>
                    <div class="form-group">
                        <label for="menuParent">Parent Menu</label>
                        <select name="menuParent" id="menuParent" class="form-control">
                            <option value="0">is Parent!</option>
                            @foreach ($parent as $p)
                                <option value="{{ $p->menuId }}">{{ $p->menuName }}</option>
                            @endforeach
                        </select>
                        <small class="text-danger" id="valid_menuParent"></small>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xl-6">
                    <div class="form-group">
                        <label for="menuUrlActive">URL Aktif</label>
                        <input type="text" class="form-control" name="menuUrlActive" id="menuUrlActive">
                        <small class="text-danger" id="valid_menuUrlActive"></small>
                    </div>
                    <div class="form-group">
                        <label for="menuParentActive">Parent Active</label>
                        <input type="text" class="form-control" name="menuParentActive" id="menuParentActive">
                        <small class="text-danger" id="valid_menuParentActive"></small>
                    </div>
                    <div class="form-group">
                        <label for="menuIcon">Icon (for Parent Menu)</label>
                        <input type="text" class="form-control" name="menuIcon" id="menuIcon">
                        <small class="text-danger" id="valid_menuIcon"></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success btn-sm" onclick="tambah()" id="insert"><i class="fas fa-plus"></i> Simpan</button>
          <button type="button" class="btn btn-danger btn-sm" onclick="batal()" id="cancel"><i class="fas fa-times"></i> Cancel</button>
          <button type="button" class="btn btn-warning btn-sm" onclick="ubah()" id="update"><i class="fas fa-edit"></i> Update</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
    $(function(){
        loadData();
        $('#btnAddMenu').click(function(){
            $('#modalMenu').modal('show');
            $('#update').hide();
            $('#cancel').hide();
            $('#modalTitle').text('Tambah Menu');
            $('small').text('');
            $('#adminPassword').attr('disabled',false);
        })
    });

    function batal(){
        $('#cancel').hide();
        $('#update').hide();
        $('form').trigger('reset');
        $('#insert').show();
        $('small').text('');
    }

    function btnToUpdate(){
        $('#modalMenu').modal('show')
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
                url: "{{ url('admin/menu/load') }}",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'GET'
            },
            columns: [
                { name: 'menuId', searchable: false, orderable: true, className: 'text-center' },
                { name: 'menuName' },
                { name: 'menuUrl'},
                { name: 'menuParent'},
                { name: 'action', searchable: false, orderable: false, className: 'text-center' }
            ],
            order: [[0, 'asc']],
            iDisplayInLength: 10 
        });
    }

    function tambah(){
        var formData = $('#formMenu').serialize();
        $.ajax({
            url : '{{ url("admin/menu/insert") }}',
            headers : {
                'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content')
            },
            dataType : 'JSON',
            data : formData,
            method : 'POST',
            success:function(res){
                if(res.status == 200){
                    $('#modalMenu').modal('hide');
                    $('#tableData').DataTable().ajax.reload(null, false);
                }else if(res.status == 401){
                    $.each(res.errors, function (i, val) {
                        $('#valid_'+i).text(val);
                    });
                }else{
                    alert(res.result);
                } 
            }
        })
    }

    function show(id){
        btnToUpdate();
        $.ajax({
            url : '{{ url("admin/menu/edit") }}/'+id,
            headers : {
                'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content')
            },
            dataType : 'JSON',
            success:function(res){
               $('#menuName').val(res.menuName)
               $('#menuUrl').val(res.menuUrl)
               $('#menuParent').val(res.menuParent).trigger('change')
               $('#menuUrlActive').val(res.menuUrlActive)
               $('#menuParentActive').val(res.menuParentActive)
               $('#menuIcon').val(res.menuIcon)
               $('#update').attr('onclick','ubah('+res.menuId+')')
            }
        })
    }

    function ubah(id){
        var formData = $('#formMenu').serialize();
        $.ajax({
            url : '{{ url("admin/menu/update") }}/'+id,
            headers : {
                'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content')
            },
            dataType : 'JSON',
            data : formData,
            method : 'POST',
            success:function(res){
                if(res.status == 200){
                    $('#modalMenu').modal('hide');
                    $('#tableData').DataTable().ajax.reload(null, false);
                }else if(res.status == 401){
                    $.each(res.errors, function (i, val) {
                        $('#valid_'+i).text(val);
                    });
                }else{
                    alert(res.result);
                } 
            }
        })
    }

    function deleteData(id){
        $.ajax({
            url : '{{ url("admin/menu/delete") }}/'+id,
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