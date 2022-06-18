@include('template/sidebar');

<div class="main-content">
    <section class="section">
        <div class="section-header" style="margin-top:-30px">
            <h1>Daftar Peminjaman Cone</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <a href="{{route('tambah_peminjaman')}}" class="btn btn-primary">Tambah Data Peminjaman</a>
                        </h4>
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>No Hp</th>
                                    <th>Jumlah Peminjaman</th>
                                    <th>Alamat</th>
                                    <th>Status Peminjaman</th>
                                </tr>
                                @php
                                    $no =1;
                                @endphp
                                @foreach($data as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama_peminjam}}</td>
                                    <td>{{$data->no_hp}}</td>
                                    <td>{{$data->jumlah_peminjaman}}</td>
                                    <td>{{$data->alamat}}</td>
                                    <td>
                                    @if($data->status_pengembalian == 0)
                                        <a href=""  class="badge badge-primary">Dalam Proses</a>
                                    @endif
                                    @if($data->status_pengembalian == 1)
                                        <a href=""  class="badge badge-warning">Sedang Di Pinjam</a>
                                    @endif
                                     @if($data->status_pengembalian == 2)
                                        <a href="" class="badge badge-success">Telah Di Kembalikan</a>
                                    @endif
                                    
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('template/footer');
