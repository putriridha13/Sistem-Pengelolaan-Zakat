@extends('templates.master')
@section('title', 'Profile')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-10">
          @if (session('pesan'))
            <div class="alert alert-success alert-dismissible mt-2">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
              {{ session('pesan') }}
            </div>
          @endif
          <div class="card card-primary card-outline mt-2">
            <div class="card-header">
              <h5 class="m-0">Profile {{ auth()->user()->name }}</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <img src="img/{{ auth()->user()->picture }}" alt="" class="img-thumbnail border border-0">
                </div>
                <div class="col-md-8">
                  <h2 class="font-weight-bold">{{ auth()->user()->name }}</h2>
                  <div class="d-inline-block">
                    <div class="bg-secondary p-2"><i class="fas fa-user"></i> {{ auth()->user()->username }}</div>
                    <div class="bg-secondary p-2 my-1"><i class="fas fa-envelope"></i> {{ auth()->user()->email }}</div>
                    <div class="bg-secondary p-2"><i class="fas fa-phone"></i> {{ auth()->user()->phone_number }}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card card-outline card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
              <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Edit</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                  <form action="/profile/update/{{ auth()->user()->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3 row">
                      <label for="name" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ auth()->user()->name }}">
                        @error('name')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ auth()->user()->email }}">
                        @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="phone_number" class="col-sm-2 col-form-label">Nomor Telepon</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ auth()->user()->phone_number }}">
                        @error('phone_number')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ auth()->user()->address }}</textarea>
                        @error('address')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="picture" class="col-sm-2 col-form-label">Foto Profile</label>
                      <div class="col-sm-10">
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input @error('picture') is-invalid @enderror" id="picture" name="picture">
                            <label class="custom-file-label" for="picture">Pilih Gambar</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="username" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ auth()->user()->username }}">
                        @error('username')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="oldpass" class="col-sm-2 col-form-label">Passowrd Lama</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control @error('oldpass') is-invalid @enderror" id="oldpass" name="oldpass">
                        @error('oldpass')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="newpass" class="col-sm-2 col-form-label">Passowrd Baru</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control @error('newpass') is-invalid @enderror" id="newpass" name="newpass">
                        @error('newpass')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="repeatpass" class="col-sm-2 col-form-label">Konfirmasi password baru</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control @error('repeatpass') is-invalid @enderror" id="repeatpass" name="repeatpass">
                        @error('repeatpass')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm float-right">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection