@extends('templates.master')
@section('title', 'Data Penyaluran')
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
          <div class="row">
            <div class="col-12">
              <a href="{{ url('distribution/totaldana') }}" class="btn btn-sm btn-primary my-2 float-right">Lihat total dana</a>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              @if (auth()->user()->roles != "admin")
              <h3 class="card-title"><a href="{{ route('distribution.create') }}" class="btn btn-sm btn-success">Tambah</a></h3>
              @endif
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <form action="/distribution" method="get">
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
                    <th class="text-center">No Penyaluran</th>
                    <th class="text-center">Nama Mustahik</th>
                    <th class="text-center">Jumlah Zakat</th>
                    <th class="text-center">Tanggal Penyaluran</th>
                    <th class="text-center">Nama Amil</th>
                    @if (auth()->user()->roles != "admin")
                    <th class="text-center">Aksi</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @if ($distribution->count())
                  @foreach ($distribution as $data)
                  <tr>
                    <td class="text-center">{{ $loop->iteration + $distribution->firstItem() - 1 }}</td>
                    <td class="text-center">{{ $data->no_penyaluran }}</td>
                    <td class="text-center">{{ $data->nama_mustahik }}</td>
                    <td class="text-center">Rp @convert($data->jumlah_zakat)</td>
                    <td class="text-center">{{ date('d M Y', strtotime($data->created_at)) }}</td>
                    <td class="text-center">{{ $data->nama_amil }}</td>
                    @if (auth()->user()->roles != "admin")
                    <td>
                      <div class="d-flex justify-content-center">
                        <a href="{{ route('distribution.edit', $data->id) }}" class="btn btn-sm btn-success mr-1">Edit</a>
                        <form action="{{ route('distribution.destroy', $data->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data Penyaluran ini?')">Hapus</button>
                        </form>
                      </div>
                    </td>
                    @endif
                  </tr>
                @endforeach
                  @else
                  <tr>
                    <td colspan="8" class="text-center font-weight-bold text-danger">Data Penyaluran kosong.</td>
                  </tr>
                  @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                {{ $distribution->links() }}
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