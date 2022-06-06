@extends('templates.master')
@section('title', 'Home')
@section('content')
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-image: url('{{ asset('img/zakat_notext_new.png') }}')">
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
        <div class="col-md-12">
          <h2 class="text-center text-light" style="font-size:40px;">SELAMAT DATANG DI SISTEM INFORMASI PENGELOLAAN ZAKAT</h2>
        </div>
      </div>
      <!-- /.row --> 
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection