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
                            <a href="{{route('daftar_peminjaman')}}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali Ke Halaman Sebelumnya</a>
                        </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Tambah Data Peminjaman</h4>
                                </div>
                                <div class="card-body">
                                    {{-- <div class="alert alert-danger alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                                <span>&times;</span>
                                            </button>

                                            <b>Note!</b> Not all browsers support HTML5 type input.
                                        </div>
                                    </div> --}}
                                    <form method="POST" action="{{route('tambah_p')}}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input id="nama" type="text" class="form-control" name="nama" tabindex="1" required autofocus>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input id="email" type="text" class="form-control" name="email" tabindex="1" required autofocus>
                                                <div class="invalid-feedback">
                                                    Masukkan Email
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ho_hp" class="col-sm-3 col-form-label">Ho Handphone</label>
                                            <div class="col-sm-9">
                                                <input id="no_hp" type="text" class="form-control" name="no_hp" tabindex="1" required autofocus>
                                                <div class="invalid-feedback">
                                                    Masukkan No Handphone
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Jumlah Peminjaman</label>
                                            <div class="col-sm-9">
                                                <input id="number" type="number" class="form-control" name="jumlah" tabindex="1" required autofocus>
                                                <div class="invalid-feedback">
                                                    Masukkan Jumlah Peminjaman
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="d-block col-sm-3">Peminjam</label>
                                            <div class="form-check col" style="padding-left:50px">
                                                <input class="form-check-input" type="radio" name="peminjam" id="p1" checked value="lembaga" onclick="Checkradiobutton()">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Lembaga/Organisasi/Instansi
                                                </label>
                                            </div>
                                            <div class="form-check col">
                                                <input class="form-check-input" type="radio" name="peminjam" id="p2" value="individu" onclick="Checkradiobutton()">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    Individu
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Lembaga/Instansi</label>
                                            <div class="col-sm-9">
                                                <input id="lembaga" type="text" class="form-control" name="lembaga" id="lembaga" tabindex="1" required autofocus>
                                                <div class="invalid-feedback">
                                                    Masukkan Lembaga/Organisasi/Instansi Peminjam
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Alasan Peminjaman</label>
                                            <div class="col-sm-9">
                                                <input id="alsan" type="text" class="form-control" name="alasan" tabindex="1" required autofocus>
                                                <div class="invalid-feedback">
                                                    Masukkan Alasan Peminjaman
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Alamat Peminjaman</label>
                                            <div class="col-sm-9">
                                                <input id="alamat" type="text" class="form-control" name="alamat" tabindex="1" required autofocus>
                                                <div class="invalid-feedback">
                                                    Masukkan Alamat Peminjaman
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Tanggal Peminjaman</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control" name="awal" required autofocus>
                                                <div class="invalid-feedback">
                                                    Masukkan Tanggal Peminjaman
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <p class="mt-2">Sampai</p>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control" name="akhir" required autofocus>
                                                <div class="invalid-feedback">
                                                    Masukkan Tanggal Peminjaman
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Surat</label>
                                            <div class="col-sm-9">
                                                <input type="file" id="file" onchange="return fileValidation()" class="form-control" id="validationCustom02" name="surat"/>
                                                <span class="text-danger" id="text"></span>
                                                <div class="invalid-feedback">
                                                    Masukkan Surat Peminjaman
                                                </div>
                                                {{-- <div class="text-danger" id="text" style="font-size:0.8em;"> --}}

                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Simpan Data</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

@include('template/footer');

<script>
    function Checkradiobutton() {
        if (document.getElementById('p2').checked) {
            document.getElementById('lembaga').disabled = true;
        } else {
            document.getElementById('lembaga').disabled = false;
        }
    }

    function fileValidation() {
            var fileInput =
                document.getElementById('file');

            var filePath = fileInput.value;

            // Allowing file type
            var allowedExtensions =
                /(\.jpg|\.jpeg|\.png|\.heif|\.heic|\.pdf)$/i;

            if (!allowedExtensions.exec(filePath)) {
                document.getElementById('text').innerHTML = "Maaf file Format Inputan anda salah";
            } else {
                document.getElementById('text').innerHTML = "";
            }
        }

</script>
