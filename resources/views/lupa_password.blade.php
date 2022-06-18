@include('template/header')

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{asset('img/icon.png')}}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header justify-content">
              <h4>Lupa Password</h4>
              </div>
              <div class="card-body">
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
                <form method="POST" action="{{route('reset_password')}}" class="needs-validation" novalidate="">
                {{ csrf_field() }}
                  <div class="form-group">
                    <label for="reset">Masukkan Kode Reset Password</label>
                    <input id="reset" type="text" class="form-control" name="reset" tabindex="1" required autofocus>
                     <small id="emailHelp" class="form-text text-muted">Silahkan Cek Kode Reset Password di Buku Panduan.</small>
                    <div class="invalid-feedback">
                      Masukkan Kode
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Reset
                    </button>
                  </div>
                </form>
                <div>
                    <a href="{{ route('index') }}"> <i class="fas fa-arrow-left"></i>  Kembali Ke Halaman Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@include('template/footer');