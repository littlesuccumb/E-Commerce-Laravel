@extends('layouts.app')

@section('title', 'DATA TRANSAKSI')

@section('content')
<div class="card mb-3 shadow">
        <div class="card-body d-flex justify-content-between">
            <h2 class="mb-0">TRANSAKSI</h2>
            <form action="{{ route('transaksi.search') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari Transaksi...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-dark" style="width: 100%">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NO TRANSAKSI</th>
                            <th>NAMA PRODUCT(S)</th>
                            <th>TOTAL HARGA</th>
                            <th>TANGGAL DIBUAT</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; $grandTotal = 0; @endphp
                        @foreach ($transaksis as $notransaksi => $groupedTransaksis)
                            @php $totalHarga = 0; @endphp
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $notransaksi }}</td>
                                <td>
                                    @foreach ($groupedTransaksis as $transaksi)
                                        {{ $transaksi->products->nama }} ({{ $transaksi->qty }})<br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($groupedTransaksis as $transaksi)
                                        @php
                                            $totalHarga += $transaksi->total_harga;
                                            $grandTotal += $transaksi->total_harga;
                                        @endphp
                                    @endforeach
                                    Rp.{{ number_format($totalHarga, 0, ',', '.') }}
                                </td>
                                <td>{{ $groupedTransaksis->first()->created_at }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah anda yakin ingin menghapus product ini ?');"
                                        action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td><strong>Total Keseluruhan:</strong></td>
                            <td></td>
                            <td><strong>Rp.{{ number_format($grandTotal, 0, ',', '.') }}</strong></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
