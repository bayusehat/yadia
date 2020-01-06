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
            <form action="{{ url('admin/news/update/'.$news->newsId) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xl-12">
                        <div class="form-group">
                            <label for="newsTitle">Judul</label>
                            <input type="text" class="form-control" name="newsTitle" id="newsTitle" value="{{ $news->newsTitle }}">
                            @error('newsTitle') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="newsCategoryId">Kategori</label>
                            <select name="newsCategoryId" id="newsCategoryId" class="form-control select2">
                                <option value="">-- Pilih Kategori Berita --</option>
                                @foreach ($newsCategory as $nc)
                                    <option value="{{ $nc->newsCategoryId }}" 
                                    @if ($news->newsCategoryId == $nc->newsCategoryId)
                                        {{ 'selected' }}
                                    @else
                                        {{ '' }}
                                    @endif>{{ $nc->newsCategoryName }}</option>
                                @endforeach
                            </select>
                            @error('newsCategoryId') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="newsThumbnail">Gambar Berita</label>
                            <input type="file" class="form-control" name="newsThumbnail" id="newsThumbnail">
                            @error('newsThumbnail') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="newsTag">Tag Berita</label>
                            <select name="newsTag[]" class="form-control tags" id="newsTag" multiple>
                                @foreach ($newsTag as $nt)
                                    <option value="{{ $nt->newsTag }}" selected>{{ $nt->newsTag }}</option>
                                @endforeach
                            </select>
                            @error('newsTag') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="newsContent">Konten Berita</label>
                            @error('newsContent') <small class="text-danger">{{ $message }}</small> @enderror
                            <textarea name="newsContent" id="konten" cols="30" rows="10">{{ $news->newsContent }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xl-6">
                        <button type="submit" class="btn btn-warning btn-block"><i class="fas fa-edit"></i> Update</button>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xl-6">
                        <a href="{{ url('admin/news') }}" class="btn btn-danger btn-block"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>