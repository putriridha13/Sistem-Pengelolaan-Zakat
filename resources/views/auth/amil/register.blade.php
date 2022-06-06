@extends('templates.master-auth')
@section('title', 'Register Amil')
@section('content')
<!-- Main content -->
<div class="content">
    <div class="container my-5">
      <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="#" class="h1"><b>Register Amil</b></a>
              </div>
              <div class="card-body">
                @if (session('pesan'))
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                    {{ session('pesan') }}
                  </div>
                  @endif
                <form action="/registeramilpost" method="post">
                  @csrf
                  <div class="input-group mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama lengkap">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                    @error('username')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="input-group mb-3">
                    <input type="password" name="repeatpassword" class="form-control @error('repeatpassword') is-invalid @enderror" placeholder="Ulangi password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                    @error('repeatpassword')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="row">
                    <!-- /.col -->
                    <div class="col">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>
          
                <div class="text-center mt-2">
                  <a href="/loginamil">Login amil</a>
                </div>
              </div>
              <!-- /.form-box -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<!-- /.content -->
@endsection