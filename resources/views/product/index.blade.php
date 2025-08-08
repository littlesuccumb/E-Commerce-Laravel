@extends('layouts.app')

@section('title', 'DATA PRODUK')

@section('content')

    <div class="card mb-3 shadow">
        <div class="card-body d-flex justify-content-between">
            <h2 class="mb-0">DATA PRODUK</h2>
            <form action="{{ route('product.search') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari Produk...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-hover table-dark" style="width: 100%">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">NO</th>
                        <th scope="col" class="text-center">NAMA PRODUK</th>
                        <th scope="col" class="text-center">STATUS</th>
                        <th scope="col" class="text-center">STOK</th>
                        <th scope="col" class="text-center">HARGA</th>
                        <th scope="col" class="text-center">GAMBAR</th>
                        <th scope="col" class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($products as $product)
                        <tr>
                            <td class="text-center align-middle">{{ $no++ }}</td>
                            <td class="text-center align-middle">{{ $product->nama }}</td>
                            <td class="text-center align-middle">{{ $product->status }}</td>
                            <td class="text-center align-middle">{{ $product->stok }}</td>
                            <td class="text-center align-middle">Rp.{{ number_format($product->harga, 0, ',', '.') }}</td>
                            <td class="text-center">
                            @if($product->gambar)
                                <img src="{{ asset($product->gambar)  }}" alt="Gambar Produk" width="80">
                            @else
                                <p>Tidak Ada Gambar</p>
                            @endif
                            </td>
                            <td class="text-center align-middle">
                                <form onsubmit="return confirm('Apakah anda yakin ingin menghapus produk ini ?');"
                                    action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-primary" onclick="return confirm('Apakah anda ingin mengedit produk ini ?')">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                <div class="alert alert-danger">
                                    Daftar Produk belum Tersedia.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
