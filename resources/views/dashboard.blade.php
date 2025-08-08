@extends('layouts.app')

@section('title', 'DASHBOARD')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <div class="h2">DASHBOARD</div>
</div>
<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h6 class="pt-2"><i class="fa fa-users"></i> Total Users</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1>{{$totalUsers}}</h1>
                </center>
            </div>
            <div class="card-footer">
                <a href="{{ route('user.index')}}" style="text-decoration: none;">Lihat Detail
                     <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
    <!-- STATUS cardS -->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <h6 class="pt-2"><i class="fas fa-wallet"></i> Total Transaksi</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1>{{$totalTransaksi}}</h1>
                </center>
            </div>
            <div class="card-footer">
                <a href="{{ route('transaksi.index')}}" style="text-decoration: none;">Lihat Detail
                     <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
    <!-- STATUS cardS -->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header text-white" style="background-color:#f8b739">
                <h6 class="pt-2"><i class="fas fa-money-bill-alt"></i> Nota Transaksi</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1>{{$totalNota}}</h1>
                </center>
            </div>
            <div class="card-footer">
                <a href="{{ route('transaksi.laporan')}}"style="text-decoration: none;">Lihat Detail
                     <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h6 class="pt-2"><i class="fas fa-shopping-bag"></i> Total Product</h6>
            </div>
            <div class="card-body">
                <center>
                    <h1>{{$totalProduct}}</h1>
                </center>
            </div>
            <div class="card-footer">
                <a href="{{ route('product.index')}}" style="text-decoration: none;">Lihat Detail
                     <i class='fa fa-angle-double-right'></i></a>
            </div>
        </div>
        <!--/grey-card -->
    </div><!-- /col-md-3-->
</div>
<div class="row">
    <!-- Kolom untuk menampilkan daftar katalog produk -->
    <div class="col-md-6 mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Product Favorite</h5>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($products as $index => $product)
                        @if ($index === 3)
                            @break
                        @endif
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($product->gambar) }}" alt="{{ $product->nama }}" class="mr-3" width="150">
                                <div>
                                    <strong>{{ $product->nama }}</strong>
                                    Harga: Rp.{{ number_format($product->harga, 0, ',', '.') }}<br>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-5">
        <!-- Notifikasi atau Pesan -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Aktivitas Terkini</h5>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($recentUsers as $user)
                        <li class="list-group-item">
                            <span class="badge badge-info">Baru</span> Pengguna baru terdaftar: {{ $user->name }}
                        </li>
                    @endforeach
                    @foreach ($lowStockProducts as $product)
                        <li class="list-group-item">
                            <span class="badge badge-warning">Peringatan</span> Stok produk {{ $product->nama }} hampir habis. Segera lakukan pemesanan.
                        </li>
                    @endforeach
                    @foreach ($recentTransaksi as $notransaksi => $transaksi)
                        <li class="list-group-item">
                            <span class="badge badge-success">Transaksi Terbaru</span>
                            Transaksi nomor {{ $notransaksi }}:
                            @foreach ($transaksi as $transaksi)
                                {{ $transaksi->products->nama }} ({{ $transaksi->qty }})
                            @endforeach
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection



