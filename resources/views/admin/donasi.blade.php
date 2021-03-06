<section>
    <div class="card">
        <div class="card-header">
            <h1>
                {{ $title }}
            </h1>
        </div>
        <div class="card-body">
            @php
                if(count($totalDonasi) > 0){
                    $val = $totalDonasi[0]->value;
                    $tgl = date('d F Y, H:i',strtotime($donasi->donasiUpdate));
                }else{
                    $val = 0;
                    $tgl = 'Belum ada donasi';
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
            <div class="alert alert-primary">
                <p class="alert-heading"> Donasi Terkini :</p>
                    <h3>Rp {{ number_format($val) }}</h3> 
                <hr>
                <small class="text-danger text-right"><i>Diperbarui pada {{ $tgl }}</i></small>
            </div>
            <form action="{{ url('admin/donasi/insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xl-12">
                        <div class="form-group">
                            <label for="profilName">Nama Pemeberi Donasi :</label>
                            <input type="text" class="form-control" name="donasiName" id="donasiName">
                            @error('donasiName') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="profilName">Update Jumlah donasi :</label>
                            <input type="text" class="form-control" name="donasiValue" id="donasiValue">
                            @error('donasiValue') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xl-6">
                        <button type="submit" class="btn btn-success btn-block"><i class="fas fa-plus"></i> Simpan</button>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xl-6">
                        <a href="javascript:void(0)" class="btn btn-danger btn-block"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </form>
            <hr>
        </div>
    </div>
</section>