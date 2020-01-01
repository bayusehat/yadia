<section>
    <div class="card">
        <div class="card-header">
            <h1>
                {{ $title }}
            </h1>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/gallery/update/'.$gallery->galleryId) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xl-12">
                        <div class="form-group">
                            <label for="galleryTitle">Judul</label>
                            <input type="text" class="form-control" name="galleryTitle" id="galleryTitle" value="{{ $gallery->galleryTitle }}">
                            @error('galleryTitle') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="galleryDescription">Keterangan</label>
                            <input type="text" class="form-control" name="galleryDescription" id="galleryDescription" value="{{ $gallery->galleryDescription }}">
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
                        <button type="submit" class="btn btn-warning btn-block"><i class="fas fa-edit"></i> Update</button>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xl-6">
                        <a href="{{ url('admin/gallery') }}" class="btn btn-danger btn-block"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>