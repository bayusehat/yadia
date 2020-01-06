<section>
    <div class="card">
        <div class="card-header">
            <h1>
                {{ $title }}
            </h1>
        </div>
        <div class="card-body">
            @php
               if($config){
                   $webName   = $config->configWebName;
                   $mission   = $config->configMission;
                   $address   = $config->configAddress;
                   $telephone = $config->configTelephone;
                   $email     = $config->configEmail;
               }else{
                   $webName   = '';
                   $mission   = '';
                   $address   = '';
                   $telephone = '';
                   $email     = '';
               }
            @endphp
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
            <form action="{{ url('admin/config/act') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xl-12">
                        <div class="form-group">
                            <label for="configWebName">Nama Web</label>
                            <input type="text" class="form-control" name="configWebName" id="configWebName" value="{{ $webName }}">
                            @error('configWebName') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="configMission">Tujuan</label>
                            @error('configMission') <small class="text-danger">{{ $message }}</small> @enderror
                            <textarea name="configMission" id="konten" cols="30" rows="10">{{ $mission }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="configAddress">Alamat <span class="text-danger">*apabila lebih dari 1 pisahkan dengan (,) Koma</span></label>
                            <input type="text" class="form-control" name="configAddress" id="configAddress" value="{{ $address }}">
                            @error('configAddress') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="configTelephone">Nomor Telepon <span class="text-danger">*apabila lebih dari 1 pisahkan dengan (,) Koma</span></label>
                            <input type="text" class="form-control" name="configTelephone" id="configTelephone" value="{{ $telephone }}">
                            @error('configTelephone') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="configEmail">Email <span class="text-danger">*apabila lebih dari 1 pisahkan dengan (,) Koma</span></label>
                            <input type="text" class="form-control" name="configEmail" id="configEmail" value="{{ $email }}">
                            @error('configEmail') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xl-6">
                        <button type="submit" class="btn btn-success btn-block"><i class="fas fa-plus"></i> Simpan</button>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xl-6">
                        <a href="{{ url('admin/dashboard') }}" class="btn btn-danger btn-block"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </form>
            <hr>
        </div>
    </div>
</section>