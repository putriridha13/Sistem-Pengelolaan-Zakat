@extends('templates.master')
@section('title', 'Informasi Pembayaran')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0 text-center">Informasi Pembayaran</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 mx-auto mt-5">
          <form action="/payment" method="get">
            <label for="keyword" class="form-label text-muted">Masukkan Nomor Pembayaran</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control mr-3" name="keyword" id="keyword" placeholder="No Pembayaran">
              <button class="btn btn-success" type="submit" id="button-addon2">Lihat</button>
            </div>
          </form>

          @if (request('keyword'))
            @if ($payment->count())
            @foreach ($payment as $data)                
            <table width="100%" class="table border">
              <tr>
                <td class="font-weight-bold">Nomor Pembayaran</td>
                <td class="text-right font-weight-bold">{{ $data->no_pembayaran }}</td>
              </tr>
              <tr>
                <td class="font-weight-bold">Nama Anda</td>
                <td class="text-right font-weight-bold">{{ $data->nama_muzakki }}</td>
              </tr>
              <tr>
                <td class="font-weight-bold">Jumlah Zakat</td>
                <td class="text-right font-weight-bold">Rp @convert($data->jumlah_zakat)</td>
              </tr>
              <tr>
                <td class="font-weight-bold">Waktu</td>
                <td class="text-right font-weight-bold">{{ date('d M Y, H:i', strtotime($data->created_at)) }} WITA</td>
              </tr>
              <tr>
                <td class="font-weight-bold">Nama Amil</td>
                <td class="text-right font-weight-bold">{{ $data->nama_amil }}</td>
              </tr>
            </table>
            @endforeach
            @else
              <h1>Pembayaran belum diproses.</h1>
            @endif
          @endif
          
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection