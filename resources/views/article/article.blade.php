@extends('templates.master')
@section('title', 'Data Article')
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
        <div class="col-12">
          @if (session('pesan'))
            <div class="alert alert-success alert-dismissible mt-2">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
              {{ session('pesan') }}
            </div>
          @endif
          <div class="card">
            <div class="card-header">
              @if (auth()->user()->roles != "admin")
                <h3 class="card-title"><a href="{{ route('article.create') }}" class="btn btn-sm btn-success">Tambah</a></h3>
              @endif
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <form action="/article" method="get">
                  <input type="text" name="keyword" class="form-control float-right" placeholder="Cari"></form>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">No. </th>
                    <th class="text-center">Judul Artikel</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Author</th>
                    @if (auth()->user()->roles != "admin")
                    <th class="text-center">Aksi</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @if ($article->count())
                  @foreach ($article as $data)
                  <tr>
                    <td class="text-center" style="vertical-align: middle;">{{ $loop->iteration + $article->firstItem() - 1 }}</td>
                    <td class="text-center" style="vertical-align: middle;">{{ $data->title }}</td>
                    <td class="text-center" style="vertical-align: middle;"><img src="{{ asset('img/article/' . $data->picture) }}" width="200" height="100"></td>
                    <td style="vertical-align: middle;" class="text-break">{{ Str::substr($data->description, 0, 100) }}...</td>
                    <td class="text-center" style="vertical-align: middle;">{{ $data->author }}</td>
                    @if (auth()->user()->roles != "admin")
                    <td style="vertical-align: middle;">
                      <div class="d-flex justify-content-center">
                        <a href="{{ route('article.edit', $data->id) }}" class="btn btn-sm btn-success mr-1">Edit</a>
                        <form action="{{ route('article.destroy', $data->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data article ini?')">Hapus</button>
                        </form>
                      </div>
                    </td>
                    @endif
                  </tr>
                @endforeach
                  @else
                    <tr>
                      <td colspan="7" class="text-center font-weight-bold text-danger">Data article kosong.</td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                {{ $article->links() }}
              </ul>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection