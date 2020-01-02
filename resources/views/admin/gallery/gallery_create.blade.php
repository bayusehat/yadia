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
            <form action="{{ url('admin/gallery/insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xl-12">
                        <div class="form-group">
                            <label for="galleryTitle">Judul</label>
                            <input type="text" class="form-control" name="galleryTitle" id="galleryTitle">
                            @error('galleryTitle') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="galleryDescription">Keterangan</label>
                            <input type="text" class="form-control" name="galleryDescription" id="galleryDescription">
                            @error('galleryDescription') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="galleryFile">File</label>
                            <input type="file" class="form-control" name="galleryFile" id="galleryFile">
                            @error('galleryFile') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xl-6">
                        <button type="submit" class="btn btn-success btn-block"><i class="fas fa-plus"></i> Simpan</button>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xl-6">
                        <a href="{{ url('admin/gallery') }}" class="btn btn-danger btn-block"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>