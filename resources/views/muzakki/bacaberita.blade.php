@extends('templates.master')
@section('title', 'Baca Berita')
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
        <div class="col-md-8 mx-auto">
          <h3 class="font-weight-bold text-center">{{ $data->title }}</h3>
          <img src="{{ asset('img/article/' . $data->picture) }}" width="100%" height="300" class="border border-3 rounded-lg">
          <hr class="border border-3">
          <small class="d-block mb-2 font-weight-bold">{{ date('d M Y, H:i', strtotime($data->created_at)) }}</small>
          <div class="bg-secondary p-2 rounded mb-2 d-inline-block">Author: {{ $data->author }}</div>
          <p class="text-justify">
            {{ $data->description }}
          </p>
          <a href="/berita" class="btn btn-secondary mb-3">Kembali</a>
        </div>
      </div>
      <!-- /.row --> 
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection