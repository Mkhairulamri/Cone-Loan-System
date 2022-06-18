@include('template/sidebar');

<div class="main-content">
    <section class="section">
        <div class="section-header" style="margin-top:-30px">
            <h1>Detail Peminjaman Peminjaman Cone</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <a href="{{route('daftar_peminjaman')}}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali Ke Halaman Sebelumnya</a>
                        </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="card-body row">
                            <div class="card col-sm-6">
                                <div class="card-header">
                                    <h4>Surat Peminjaman</h4>
                                    <div class="card-header-action">
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_surat">Lihat Surat</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-2 text-muted">Surat Peminjaman Cone</div>
                                    <div class="chocolat-parent">
                                        @foreach($data as $img)
                                        <?php
                                    $path = pathInfo($img->surat_peminjaman);

                                    $ext = $path['extension'];

                                    ?>
                                        @if($ext == "pdf")
                                        <h4>Contoh menampilkan file pdf dengan tag embed</h4>
                                        <embed type="application/pdf" src="{{asset('storage/img/1646534408_Form TA 05 - Penilaian Mandiri Seminar Proposal TA.pdf')}}" width="600" height="400"></embed>

                                        <p>Lihat Surat <a href="{{asset('storage/img/1646534408_Form TA 05 - Penilaian Mandiri Seminar Proposal TA.pdf')}}">to the PDF!</a></p>
                                        </object>
                                        @elseif($ext == "jpg" || "jpeg" || "png" || "HEIV" || "HEIC")
                                        <a href="{{asset('storage/img/$img->surat_peminjaman')}}" class="chocolat-image" title="Just an example">
                                            <div data-crop-image="285">
                                                <img alt="image" src="{{asset('img/example-image.jpg')}}" class="img-fluid">
                                            </div>
                                        </a>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="card  col-sm-6" id="sample-login">
                                <form>
                                    <div class="card-header">
                                        <h4>Detail Peminjaman</h4>
                                    </div>
                                    @foreach($data as $p)
                                    <div class="card-body pb-0">
                                        <div class="form-group">
                                            <label>Nama Peminjam</label>
                                            <input type="text" class="form-control" disabled value="{{$p->nama_peminjam}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" disabled value="{{$p->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label>No Handphone</label>
                                            <input type="text" class="form-control" disabled value="{{$p->no_hp}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Peminjaman</label>
                                            <input type="text" class="form-control" disabled value="{{$p->jumlah_peminjaman}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Lembaga</label>
                                            <input type="text" class="form-control" disabled value="{{$p->lembaga}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Alasan Peminjaman</label>
                                            <textarea class="form-control" disabled>{{$p->alasan_peminjaman}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Waktu Mulai Peminjaman</label>
                                            <input type="text" class="form-control" disabled value="{{date('d-M-Y',strtotime($p->waktu_mulai))}}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="/edit/{{$p->id}}" class="btn btn-primary mr-1">Edit</a>
                            @if($p->status_pengembalian == 0)
                            <a href="#" class="btn btn-primary mr-1" data-target="#ubah_proses" data-toggle="modal">Ubah Status</a>
                            @elseif($p->status_pengembalian == 1)
                            <a href="#" class="btn btn-primary mr-1" data-target="#update" data-toggle="modal">Ubah Status</a>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</div>

@include('template/footer');

@foreach($data as $p)

{{-- modal Sedang Proses Peminjaman --}}
<div class="modal fade" tabindex="-1" role="dialog" id="ubah_proses">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Status Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Cone sudah Di ambil oleh Yang bersangkutan?</p>
                <div class="modal-footer br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Sudah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal update peminjaman --}}
<div class="modal fade" tabindex="-1" role="dialog" id="update">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Status Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('update_status')}}" class="needs-validation" novalidate="">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="d-block col-sm-3">Kerusakan</label>
                        <div class="form-check col" style="padding-left:50px">
                            <input class="form-check-input" type="radio" name="kerusakan" id="p1" checked value="rusak" onclick="cekKerusakan()">
                            <label class="form-check-label" for="exampleRadios1">
                                Ada Kerusakan
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="kerusakan" id="p2" value="tidak" onclick="cekKerusakan()">
                            <label class="form-check-label" for="exampleRadios2">
                                Tidak
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Jumlah Kerusakan</label>
                        <div class="col-sm-9">
                            <input id="kerusakan" type="number" class="form-control" name="kerusakan" id="kerusakan" tabindex="1" required autofocus onchange="return kerusakanValidation()">
                            <div class="invalid-feedback">
                                Masukkan Jumlah Kerusakan
                            </div>
                            <div class="text-danger" id="cek_kerusakan">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Tanggal Pengembalian</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="pengembalian" id="pengembalian" tabindex="1" required autofocus onchange="return cek_terlambat()">
                            <div class="invalid-feedback">
                                Masukkan Jumlah Hari Keterlambatan
                            </div>
                            <div class="text-danger" id="error1"></div>
                            <div class="text-danger" id="error2"></div>

                        </div>
                    </div>
            </div>
            <div class="modal-footer br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="submit">Simpan Pengadaan</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<script>
    function cekKerusakan() {
        if (document.getElementById('p1').checked) {
            document.getElementById('kerusakan').disabled = false;
        } else {
            document.getElementById('kerusakan').disabled = true;
        }
    }

    function cek_terlambat() {

        var tanggal;

        @foreach($data as $a)
        tanggal = {
            {
                date('Y-M-d', strtotime($a - > waktu_mulai))
            }
        }
        @endforeach

        var pengembalian = document.getElementById('pengembalian').value;

        /*
        document.getElementById('error1').innerHTML = tanggal ; 
        document.getElementById('error2').innerHTML = pengembalian ; 
        */


        if (pengembalian > tanggal) {
            document.getElementById('error_terlambat').innerHTML = "Maaf Tanggal Yang Anda Masukkan Sebelum Peminjaman Terjadi";
            document.getElementById('submit').disabled = true;
        } else {

            document.getElementById('error_terlambat').innerHTML = "Gatau Bingung";
            document.getElementById('submit').disabled = false;
        }

    }

    function kerusakanValidation() {
        var jumlah;

        @foreach($data as $d)
        jumlah = {
            {
                $d - > jumlah_peminjaman
            }
        }
        @endforeach

        var value = document.getElementById('kerusakan').value;

        if (value > jumlah) {
            document.getElementById('cek_kerusakan').innerHTML = "Maaf Jumlah Yang Anda Masukkan Lebih Besar dari Jumlah Peminjaman";
        } else {
            document.getElementById('cek_kerusakan').innerHTML = "";
        }
    }

</script>
