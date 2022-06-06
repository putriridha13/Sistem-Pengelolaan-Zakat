@extends('templates.master-auth')
@section('title', 'Sistem Informasi Pengelolaan Zakat')
@section('content')
  <!-- Main content -->
  <div class="content">
    <div class="container my-5">
      <div class="row">
        <div class="col-lg-6">
          @if (session('pesan'))
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
            {{ session('pesan') }}
          </div>
          @endif
          <span class="display-3 text-light">SISTEM INFORMASI PENGELOLAAN ZAKAT</span>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection