<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>P4MP - LOGIN</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
  <main>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6 login-section-wrapper">
                <div class="brand-wrapper">
                  <a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="" style="width: 70%;"></a>
                </div>
                <div class="login-wrapper my-auto">
                  <h1 class="login-title">Daftar</h1>
                  <form action="#!">
                    <div class="form-group" id="con_email">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama Anda">
                        @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    <div class="form-group" id="con_email">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="anda@example.com">
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group mb-4">
                      <label for="password">Password</label>
                      <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password Anda">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="password-confirm">Re-Password</label>
                        <input type="password" name="password_confirmation" id="password-confirm" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password Sekali Lagi">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    <input name="login" id="login" class="btn btn-block  login-btn" type="submit" value="Login">
                  </form>
                  <p>Sudah punya akun ? <a href={{url('/login')}}>Masuk disini</a></p>

                </div>
              </div>
              <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="{{asset('img/register.jpg')}}" alt="login image" class="login-img">
              </div>
            </div>
          </div>
    </form>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  {{-- Check --}}
 

</body>
</html>
