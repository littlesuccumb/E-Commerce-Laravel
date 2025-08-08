@extends('layouts.app')

@section('title', 'NOTA TRANSAKSI')

@section('content')
<div class="card mb-3 shadow">
        <div class="card-body d-flex justify-content-between">
            <h2 class="mb-0">NOTA TRANSAKSI</h2>
            <form action="{{ route('transaksi.searchLaporan') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari Nota Transaksi...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<div class="card shadow">
    <div class="card-body">
<div class="row">
    @php $count = 0; @endphp
    @foreach ($transaksis as $notransaksi => $groupedTransaksis)
        <div class="col-md-4">
            <div class="nota-struk">
                <div class="header">NOTA TRANSAKSI</div>
                <div class="body">
                    <div>
                        <strong>No Transaksi:</strong> {{ $notransaksi }}
                    </div>
                    <div>
                        <strong>Waktu:</strong> {{ $groupedTransaksis->first()->created_at->format('Y-m-d H:i:s') }}
                    </div>
                    <div class="produk">
                        @php $total = 0; @endphp
                        @foreach ($groupedTransaksis as $transaksi)
                            <div>
                                <span class="nama">{{ $transaksi->products->nama }}</span> ({{ $transaksi->qty }})
                                <span class="harga">Rp.{{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
                            </div>
                            @php $total += $transaksi->total_harga; @endphp
                        @endforeach
                    </div>
                    <div class="total">
                        <strong>Total:</strong> Rp.{{ number_format($total, 0, ',', '.') }}
                    </div>
                </div>
                <div class="footer">
                    <strong>Terima kasih atas kunjungan Anda!</strong>
                </div>
            </div>
        </div>
        @php $count++; @endphp
        @if ($count % 3 === 0)
            </div>
            <div class="row">
        @endif
    @endforeach
</div>
    </div>
</div>
@endsection
