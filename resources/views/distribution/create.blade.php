@extends('templates.master')
@section('title', 'Tambah Data Penyaluran')
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
          <div class="card card-primary">
            <!-- /.card-header -->
            @if ($mustahik->count())
                <!-- form start -->
            <form action="{{ route('distribution.store') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="mb-3 row">
                  <label for="no_penyaluran" class="col-sm-2 col-form-label">No Penyaluran</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" readonly id="no_penyaluran" name="no_penyaluran" value="{{ $no_penyaluran }}">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="nama_mustahik" class="col-sm-2 col-form-label">Nama Mustahik</label>
                  <div class="col-sm-10">
                    <select class="form-select form-control" name="nama_mustahik" aria-label="Default select example">
                      <option selected disabled>.: Pilih :.</option>
                      @foreach ($mustahik as $data)
                        <option value="{{ $data->name }}">{{ $data->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="nama_amil" class="col-sm-2 col-form-label">Nama Amil</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" readonly id="nama_amil" name="nama_amil" value="{{ auth()->user()->username }}">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="jumlah_zakat" class="col-sm-2 col-form-label">Jumlah Zakat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('jumlah_zakat') is-invalid @enderror" id="jumlah_zakat" name="jumlah_zakat">
                    @error('jumlah_zakat')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="/distribution" class="btn btn-danger float-right mx-2">Kembali</a>
                  <button type="submit" class="btn btn-success float-right">Simpan</button>
              </div>
            </form>
            @else
              <div class="text-center my-5">
                <h4>Maaf, Silahkan isikan data <a href="/mustahik">Mustahik</a> terlebih dahulu.</h4>
                <p class="font-weight-bold text-danger">Karena Data tersebut masih kosong.</p>
              </div>
            @endif
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