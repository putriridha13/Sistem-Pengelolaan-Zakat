@extends('templates.master')
@section('title', 'Total Dana Penerimaan')
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
        <div class="col-md-12">
        <h2 class="text-center" style="font-size:40px;">SELAMAT DATANG DI SISTEM INFORMASI PENGELOLAAN ZAKAT</h2>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-people-carry"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">PENERIMAANA ZAKAT</span>
              <span class="info-box-number">Rp @convert($total_reception)</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa-people-arrows"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">PENYALURAN ZAKAT</span>
              <span class="info-box-number">Rp @convert($total_distribution)</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-dollar-sign"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TOTAL KAS ZAKAT</span>
              <span class="info-box-number">Rp @convert($total_cash)</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection