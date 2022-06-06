@extends('templates.master')
@section('title', 'Kritik & saran')
@section('content')
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 mx-auto mt-5">
          @if (session('pesan'))
            <div class="alert alert-success alert-dismissible mt-2">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
              {{ session('pesan') }}
            </div>
          @endif
          <form action="sugestion/post" method="post">
            @csrf
            <div class="mb-3">
              <label for="sugestion" class="form-label">Kritik & saran anda sangat berarti</label>
              <textarea class="form-control @error('sugestion') is-invalid @enderror" id="sugestion" name="sugestion" rows="3"></textarea>
              @error('sugestion')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary float-right">Kirim</button>
          </form>
        </div>
      </div>
      <!-- /.row --> 
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection