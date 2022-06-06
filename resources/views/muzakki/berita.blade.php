@extends('templates.master')
@section('title', 'Berita')
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
          <div class="display-4 text-center">Berita Terkini</div>
          <hr class="border border-3">
          <div class="d-flex justify-content-end">
            <div class="input-group input-group-sm" style="width: 150px;">
              <form action="/berita" method="get">
              <input type="text" name="keyword" class="form-control" placeholder="Cari"></form>
            </div>
          </div>
          <div class="row row-cols-1 row-cols-md-3 g-4">
            @if ($berita->count())
              @foreach ($berita as $data)
              <div class="col my-2">
                <div class="card h-100 border border-5 rounded-lg">
                  <img src="{{ asset('img/article/' . $data->picture) }}" height="200">
                  <div class="card-body">
                    <h5 class="card-title font-weight-bold">{{ $data->title }}</h5>
                    <p class="card-text text-break">{{ Str::substr($data->description, 0, 200) }}...</p>
                    <a href="/berita/bacaberita/{{ $data->id }}">Baca selengkapnya</a>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Terakhir diupload {{ date('d M Y, H:i', strtotime($data->created_at)) }} WITA oleh <span class="font-weight-bold">{{ $data->author }}</span></small>
                  </div>
                </div>
              </div>
              @endforeach
            @else
              <div class="col-md-12">
                <h3 class="text-center font-weight-bold">Tidak ada berita.</h3>
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