@include('template/sidebar');

<div class="main-content">
    <section class="section">
        <div class="section-header" style="margin-top:-30px">
            <h1>Profil</h1>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Profil Admin Peminjaman Cone Dishub</h4>
                    </div>
                    <div class="card-body">
                        {{-- Menampilkan Pesan Berhasil Atau Gagal --}}
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
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" disable value={{ ucfirst($user = Auth::user()->name) }} readonly>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" disable value={{ucfirst($user = Auth::user()->username)}} readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" disable value={{ucfirst($user = Auth::user()->email)}} readonly>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit" data-toggle="modal" data-target="#update">Edit Profil</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('template/footer');

        <div class="modal fade" tabindex="-1" role="dialog" id="update">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('update_profil')}}" class="needs-validation" novalidate="">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input id="nama" type="text" class="form-control" name="name" tabindex="1" required autofocus value="{{ ucfirst($user = Auth::user()->name) }}">
                                <div class="invalid-feedback">
                                    Masukkan nama
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus value="{{ ucfirst($user = Auth::user()->username) }}">
                                <div class="invalid-feedback">
                                    Masukkan nama
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus value="{{ ucfirst($user = Auth::user()->email) }}">
                                <div class="invalid-feedback">
                                    Masukkan Email Yang Valid
                                </div>
                            </div>
                            <hr>
                            <br>
                            <div class="form-group">
                                <label class="control-label"> Jika Ingin Mengubah Password Silahkan Di isi, Jika Tidak Kosongkan Saja</label>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password_lama" class="control-label">Password Lama</label>
                                </div>
                                <input id="password_lama" type="password" class="form-control" name="password_lama" tabindex="2">
                                <div class="invalid-feedback">
                                    Tolong Masukkan Password Lama Anda
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password_baru" class="control-label">Password Baru</label>
                                </div>
                                <input id="password_baru" type="password" class="form-control" name="password_baru" tabindex="2">
                                <div class="invalid-feedback">
                                    Tolong Masukkan Password Baru Anda
                                </div>
                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            <input type="hidden" name="id" value="{{$user = Auth::user()->id}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
