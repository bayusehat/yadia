<section>
    <div class="card">
        <div class="card-header">
            <h1>
                {{ $title }}
            </h1>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sukses!</strong> {{ Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sukses!</strong> {{ Session::get('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
           
            <form action="{{ url('admin/change/password/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xl-12">
                        <div class="form-group">
                            <label for="profilName">Password Baru :</label>
                            <input type="password" class="form-control" name="adminPasswordNew" id="adminPasswordNew">
                            @error('adminPasswordNew') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="profilName">Ulangi Password :</label>
                            <input type="password" class="form-control" name="adminPasswordConfirm" id="adminPasswordConfirm">
                            @error('adminPasswordConfirm') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xl-12">
                        <button type="submit" class="btn btn-warning btn-block"><i class="fas fa-edit"></i> Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>