@include('template/sidebar');


<div class="main-content">
    <section class="section">
        <div class="section-header" style="margin-top:-30px">
            <h1>Pengadaan Cone</h1>

        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Riwayat Pengadaan Cone</h4>
                        <div class="card-header-form">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#update"><i class="far fa-edit"></i> Tambah Pengadaan</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{session('success')}}.
                            </div>
                        </div>
                        @endif
                        @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{session('error')}}.
                            </div>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>#</th>
                                    <th>Keterangan Pengadaan</th>
                                    <th>Jumlah Pengadaan</th>
                                    <th>Bulan</th>
                                    <th>Tahun Anggaran</th>
                                    <th style="text-align:center; width:23%">Aksi</th>
                                </tr>
                                @php
                                $no = 1;
                                @endphp
                                @foreach($data as $pengadaan)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ substr($pengadaan->nama_pengadaan,0,100) }}...</td>
                                    <td>{{ $pengadaan->jumlah_pengadaan }}</td>
                                    <td>@php
                                        if($pengadaan->bulan ==1 ){
                                        echo "Januari";
                                        }elseif($pengadaan->bulan==2){
                                        echo "Februari";
                                        }elseif($pengadaan->bulan==2){
                                        echo "Februari";
                                        }elseif($pengadaan->bulan==3){
                                        echo "Maret";
                                        }elseif($pengadaan->bulan==4){
                                        echo "April";
                                        }elseif($pengadaan->bulan==5){
                                        echo "Mei";
                                        }elseif($pengadaan->bulan==6){
                                        echo "Juni";
                                        }elseif($pengadaan->bulan==7){
                                        echo "Juli";
                                        }elseif($pengadaan->bulan==8){
                                        echo "Agustus";
                                        }elseif($pengadaan->bulan==9){
                                        echo "September";
                                        }elseif($pengadaan->bulan==10){
                                        echo "Oktober";
                                        }elseif($pengadaan->bulan==11){
                                        echo "November";
                                        }elseif($pengadaan->bulan==12){
                                        echo "Desember";
                                        }
                                        @endphp
                                    </td>
                                    <td>{{ $pengadaan->tahun }}</td>
                                    <td style="width:200px">
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#detail{{$pengadaan->id}}">Detail</a>
                                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#edit{{$pengadaan->id}}">Edit</a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{$pengadaan->id}}">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('template/footer');

        {{-- Modal Tambah Data --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="update">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Pengadaan Cone</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('tambah_pengadaan')}}" class="needs-validation" novalidate="">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nama">Keterangan Pengadaan</label>
                                <textarea class="form-control" name="name" tabindex="1" required autofocus></textarea>
                                <div class="invalid-feedback">
                                    Masukkan Jumlah Pengadaan
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah Pengadaan</label>
                                <input id="jumlah" type="number" class="form-control" name="jumlah" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Masukkan Jumlah Pengadaan
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputState">Bulan</label>
                                    <select id="inputState" class="form-control" name="bulan">
                                        <option selected>Pilih Bulan...</option>
                                        <option name="bulan" value=1>Januari</option>
                                        <option name="bulan" value=2>Februari</option>
                                        <option name="bulan" value=3>Maret</option>
                                        <option name="bulan" value=4>April</option>
                                        <option name="bulan" value=5>Mei</option>
                                        <option name="bulan" value=6>Juni</option>
                                        <option name="bulan" value=7>Juli</option>
                                        <option name="bulan" value=8>Agustus</option>
                                        <option name="bulan" value=9>September</option>
                                        <option name="bulan" value=10>Oktober</option>
                                        <option name="bulan" value=11>November</option>
                                        <option name="bulan" value=12>Desember</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Tahun</label>
                                    <select id="inputState" class="form-control" name="tahun">
                                        <option selected>Pilih Tahun...</option>
                                        @php
                                        $tahun = date('Y');
                                        @endphp
                                        @for($i = 0; $i < 5; $i++) <option name="tahun" value={{$tahun-$i}}>{{$tahun-$i}}</option>
                                            @endfor

                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer br">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan Pengadaan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        @foreach($data as $pengadaan)
        
        {{-- Modal Detail Data --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="detail{{$pengadaan->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Pengadaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="" class="needs-validation" novalidate="">
                            <div class="form-group">
                                <label for="nama">Keterangan Pengadaan</label>
                                <textarea class="form-control" tabindex="1"  disabled>{{$pengadaan->nama_pengadaan}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah Pengadaan</label>
                                <input id="jumlah" type="number" class="form-control" tabindex="1" value="{{$pengadaan->jumlah_pengadaan}}" disabled>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputState">Bulan</label>
                                    <select id="inputState" class="form-control" disabled>
                                        <option selected>@php
                                        if($pengadaan->bulan ==1 ){
                                        echo "Januari";
                                        }elseif($pengadaan->bulan==2){
                                        echo "Februari";
                                        }elseif($pengadaan->bulan==2){
                                        echo "Februari";
                                        }elseif($pengadaan->bulan==3){
                                        echo "Maret";
                                        }elseif($pengadaan->bulan==4){
                                        echo "April";
                                        }elseif($pengadaan->bulan==5){
                                        echo "Mei";
                                        }elseif($pengadaan->bulan==6){
                                        echo "Juni";
                                        }elseif($pengadaan->bulan==7){
                                        echo "Juli";
                                        }elseif($pengadaan->bulan==8){
                                        echo "Agustus";
                                        }elseif($pengadaan->bulan==9){
                                        echo "September";
                                        }elseif($pengadaan->bulan==10){
                                        echo "Oktober";
                                        }elseif($pengadaan->bulan==11){
                                        echo "November";
                                        }elseif($pengadaan->bulan==12){
                                        echo "Desember";
                                        }
                                        @endphp</option>
                                        <option name="bulan" value=1>Januari</option>
                                        <option name="bulan" value=2>Februari</option>
                                        <option name="bulan" value=3>Maret</option>
                                        <option name="bulan" value=4>April</option>
                                        <option name="bulan" value=5>Mei</option>
                                        <option name="bulan" value=6>Juni</option>
                                        <option name="bulan" value=7>Juli</option>
                                        <option name="bulan" value=8>Agustus</option>
                                        <option name="bulan" value=9>September</option>
                                        <option name="bulan" value=10>Oktober</option>
                                        <option name="bulan" value=11>November</option>
                                        <option name="bulan" value=12>Desember</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Tahun</label>
                                    <select id="inputState" class="form-control" name="tahun" disabled>
                                        <option selected>{{$pengadaan->tahun}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer br">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Edit Data --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="edit{{$pengadaan->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Pengadaan Cone</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('update_pengadaan')}}" class="needs-validation" novalidate="">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nama">Keterangan Pengadaan</label>
                                <textarea class="form-control" name="name" tabindex="1" required autofocus>{{$pengadaan->nama_pengadaan}}</textarea>
                                <div class="invalid-feedback">
                                    Masukkan Jumlah Pengadaan
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah Pengadaan</label>
                                <input id="jumlah" type="number" class="form-control" name="jumlah" tabindex="1" required autofocus value={{$pengadaan->jumlah_pengadaan}}>
                                <div class="invalid-feedback">
                                    Masukkan Jumlah Pengadaan
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputState">Bulan</label>
                                    <select id="inputState" class="form-control" name="bulan">
                                        <option selected value={{$pengadaan->bulan}}>
                                        @php
                                        if($pengadaan->bulan ==1 ){
                                        echo "Januari";
                                        }elseif($pengadaan->bulan==2){
                                        echo "Februari";
                                        }elseif($pengadaan->bulan==2){
                                        echo "Februari";
                                        }elseif($pengadaan->bulan==3){
                                        echo "Maret";
                                        }elseif($pengadaan->bulan==4){
                                        echo "April";
                                        }elseif($pengadaan->bulan==5){
                                        echo "Mei";
                                        }elseif($pengadaan->bulan==6){
                                        echo "Juni";
                                        }elseif($pengadaan->bulan==7){
                                        echo "Juli";
                                        }elseif($pengadaan->bulan==8){
                                        echo "Agustus";
                                        }elseif($pengadaan->bulan==9){
                                        echo "September";
                                        }elseif($pengadaan->bulan==10){
                                        echo "Oktober";
                                        }elseif($pengadaan->bulan==11){
                                        echo "November";
                                        }elseif($pengadaan->bulan==12){
                                        echo "Desember";
                                        }
                                        @endphp
                                        </option>
                                        <option name="bulan" value=1>Januari</option>
                                        <option name="bulan" value=2>Februari</option>
                                        <option name="bulan" value=3>Maret</option>
                                        <option name="bulan" value=4>April</option>
                                        <option name="bulan" value=5>Mei</option>
                                        <option name="bulan" value=6>Juni</option>
                                        <option name="bulan" value=7>Juli</option>
                                        <option name="bulan" value=8>Agustus</option>
                                        <option name="bulan" value=9>September</option>
                                        <option name="bulan" value=10>Oktober</option>
                                        <option name="bulan" value=11>November</option>
                                        <option name="bulan" value=12>Desember</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Tahun</label>
                                    <select id="inputState" class="form-control" name="tahun">
                                        <option selected value="{{$pengadaan->tahun}}">{{$pengadaan->tahun}}</option>
                                        @php
                                        $tahun = date('Y');
                                        @endphp
                                        @for($i = 0; $i < 5; $i++) <option name="tahun" value={{$tahun-$i}}>{{$tahun-$i}}</option>
                                            @endfor

                                    </select>
                                </div>
                                <input type="hidden" name="id" value="{{$pengadaan->id}}">
                            </div>
                            <div class="modal-footer br">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Hapus Data pengadaan --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="hapus{{$pengadaan->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Hapus Data Pengadaan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah Anda Yakin Akan Menghapus Data Pengadaan?.</p>
                      <p class="mb-2 text-danger">Hati-Hati Saat Menghapus, karna Akan Terjadi Error Pada Data Peminjaman dan Data Cone.</p>
                    </div>
                    <div class="modal-footer">
                      <a href="/hapus_pengadaan/{{$pengadaan->id}}">
                          <button type="button" class="btn btn-danger">Hapus Data</button>
                      </a>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
            
        @endforeach

