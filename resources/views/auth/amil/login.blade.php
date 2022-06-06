@extends('templates.master-auth')
@section('title', 'Login Amil')
@section('content')
<!-- Main content -->
<div class="content">
    <div class="container my-5">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="card card-outline card-primary">
            <div class="card-header text-center">
              <a href="#" class="h1"><b>Login Amil</a>
            </div>
            <div class="card-body">
              <form action="/loginamilpost" method="post">
                @csrf
                <div class="input-group mb-3">
                  <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" placeholder="Username">
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
                  <input type="password" class="form-control" name="password" placeholder="Password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                  <!-- /.col -->
                  <div class="col">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
              <p class="mb-2 text-center">
                <a href="/registeramil" class="text-center">Registrasi amil</a>
              </p>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<!-- /.content -->
@endsection