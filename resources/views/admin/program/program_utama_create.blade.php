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
                    <strong>Gagal!</strong> {{ Session::get('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ url('admin/progutama/insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xl-12">
                        <div class="form-group">
                            <label for="programUtamaTitle">Judul Program Utama</label>
                            <input type="text" class="form-control" name="programUtamaTitle" id="programUtamaTitle">
                            @error('programUtamaTitle') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="programUtamaIcon">Icon Untuk Program Utama</label>
                            <input type="file" class="form-control" name="programUtamaIcon" id="programUtamaIcon">
                            @error('programUtamaIcon') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group"> 
                            @error('programUtamaContent') <small class="text-danger">{{ $message }}</small> @enderror
                            <label for="programUtamaContent">Konten Program Utama</label>
                            <textarea name="programUtamaContent" id="konten" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xl-6">
                        <button type="submit" class="btn btn-success btn-block"><i class="fas fa-plus"></i> Simpan</button>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xl-6">
                        <a href="{{ url('admin/progutama') }}" class="btn btn-danger btn-block"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </form>
            <hr>
        </div>
    </div>
</section>