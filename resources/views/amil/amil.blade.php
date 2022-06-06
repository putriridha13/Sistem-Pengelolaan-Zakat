@extends('templates.master')
@section('title', 'Data Amil')
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
              <h5><i class="icon fas fa-check"></i>Berhasil!</h5>
              {{ session('pesan') }}
            </div>
          @endif
          <div class="card">
            <div class="card-header">
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <form action="/dataamil" method="get">
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
                    <th class="text-center">Nama Amil</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">No. Telepon</th>
                    <th class="text-center">Tanggal Daftar</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($amil->count())
                    @foreach ($amil as $data)
                      <tr>
                        <td class="text-center">{{ $loop->iteration + $amil->firstItem() - 1 }}</td>
                        <td class="text-center">{{ $data->name }}</td>
                        <td class="text-center">{{ $data->email }}</td>
                        <td>{{ $data->address }}</td>
                        <td class="text-center">{{ $data->phone_number }}</td>
                        <td class="text-center">{{ date('d M Y', strtotime($data->created_at)) }}</td>
                        <td>
                          <div class="d-flex justify-content-center">
                            <a href="/dataamiledit/{{ $data->id }}" class="btn btn-sm btn-success mr-1">Edit</a>
                            <form action="/dataamildestroy/{{ $data->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data Amil ini?')">Hapus</button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="7" class="text-center font-weight-bold text-danger">Data Amil kosong.</td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                {{ $amil->links() }}
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