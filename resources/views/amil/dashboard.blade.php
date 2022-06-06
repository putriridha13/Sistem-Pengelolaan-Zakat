@extends('templates.master')
@section('title', 'Dashboard')
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
      @if (auth()->user()->roles == "admin")
      <div class="row">
        <div class="col">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $total_muzakki }}</h3>

              <p>Total Muzakki</p>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
          </div>
        </div>
        <div class="col">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $total_amil }}</h3>

              <p>Total Amil</p>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
          </div>
        </div>
        <div class="col">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $total_mustahik }}</h3>

              <p>Total Mustahik</p>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      @else 
      <div class="row">
        <div class="col">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $total_mustahik }}</h3>
  
              <p>Total Mustahik</p>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
          </div>
        </div>
      </div>
      @endif
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection