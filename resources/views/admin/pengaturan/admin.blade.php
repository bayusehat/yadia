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
                    <a href="javascript:void(0)" id="btnAddAdmin" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                </div>
            </div>
        <hr>
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped nowrap" style="width:100%" id="tableData">
                    <thead>
                       <tr>
                            <th>No</th>
                            <th>Role</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Last Login</th>
                            <th>Action</th>
                        </tr> 
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<form id="formAdmin">
    @csrf
  <div class="modal fade" id="modalAdmin" tabindex="-1" role="dialog" aria-labelledby="modalAdmin" aria-hidden="true">
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
                <div class="col-md-12 col-sm-12 col-xl-12">
                    <div class="form-group">
                        <label for="adminName">Nama Admin</label>
                        <input type="text" class="form-control" name="adminName" id="adminName">
                        <small class="text-danger" id="valid_adminName"></small>
                    </div>
                    <div class="form-group">
                        <label for="adminUsername">Username</label>
                        <input type="text" class="form-control" name="adminUsername" id="adminUsername">
                        <small class="text-danger" id="valid_adminUsername"></small>
                    </div>
                    <div class="form-group">
                        <label for="adminPassword">Password</label>
                        <input type="password" class="form-control" name="adminPassword" id="adminPassword">
                        <small class="text-danger" id="valid_adminPassword"></small>
                    </div>
                    <div class="form-group">
                        <label for="roleId">Role</label>
                        <select name="roleId" id="roleId" class="form-control">
                            <option value="">-- Pilih Role--</option>
                            @foreach ($role as $r)
                                <option value="{{ $r->roleId }}">{{ $r->roleName }}</option>
                            @endforeach
                        </select>
                        <small class="text-danger" id="valid_roleId"></small>
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
                url: "{{ url('admin/admin/load') }}",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'GET'
            },
            columns: [
                { name: 'adminId', searchable: false, orderable: true, className: 'text-center' },
                { name: 'roleName' },
                { name: 'adminName'},
                { name: 'adminUsername'},
                { name: 'adminLastLogin'},
                { name: 'action', searchable: false, orderable: false, className: 'text-center' }
            ],
            order: [[0, 'asc']],
            iDisplayInLength: 10 
        });
    }

    function tambah(){
        var formData = $('#formAdmin').serialize();
        $.ajax({
            url : '{{ url("admin/admin/insert") }}',
            headers : {
                'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content')
            },
            dataType : 'JSON',
            data : formData,
            method : 'POST',
            success:function(res){
                if(res.status == 200){
                    $('#modalAdmin').modal('hide');
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
            url : '{{ url("admin/admin/edit") }}/'+id,
            headers : {
                'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content')
            },
            dataType : 'JSON',
            success:function(res){
                $('#adminName').val(res.adminName)
                $('#adminUsername').val(res.adminUsername)
                $('#adminPassword').val('********').attr('disabled',true);
                $('#roleId').val(res.roleId).trigger('change');
                $('#update').attr('onclick','ubah('+res.adminId+')');
                $('#modalTitle').text('Edit Admin '+res.adminName);
            }
        })
    }

    function ubah(id){
        var formData = $('#formAdmin').serialize();
        $.ajax({
            url : '{{ url("admin/admin/update") }}/'+id,
            headers : {
                'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content')
            },
            dataType : 'JSON',
            data : formData,
            method : 'POST',
            success:function(res){
                if(res.status == 200){
                    $('#modalAdmin').modal('hide');
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