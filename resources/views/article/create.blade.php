@extends('templates.master')
@section('title', 'Tambah Data Artikel')
@section('content')
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ $title }}</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <!-- form start -->
            <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3 row">
                <label for="title" class="col-sm-2 col-form-label">Judul Artikel</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                  @error('title')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="mb-3 row">
                <label for="author" class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" readonly value="{{ auth()->user()->username }}">
                  @error('author')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                </div>
              </div>
              <div class="mb-3 row">
                <label for="picture" class="col-sm-2 col-form-label">Gambar</label>
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
                <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                  <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3"></textarea>
                  @error('description')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                </div>
              </div>
              <a href="/article" class="btn btn-danger btn-sm float-right ml-2">Kembali</a>
              <button type="submit" class="btn btn-success btn-sm float-right">Simpan</button>
            </form>
          </div>
        </div>
      </div>
      <!-- /.row -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection