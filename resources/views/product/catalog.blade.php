<!-- resources/views/beranda.blade.php -->

@extends('layouts.app')

@section('title', 'CATALOG')

@section('content')
<div class="card shadow mb-3">
    <div class="card-body">
        <h2 class="mb-0"><i class="fas fa-shopping-bag"></i>&nbsp; CATALOG</h2>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        @forelse ($products as $product)
        <div class="col-md-4">
            <div class="product-card">
                @if($product->gambar)
                <div class="product-image">
                    <img src="{{ asset($product->gambar) }}" alt="Product Image">
                </div>
                @else
                <div class="product-image">
                    <p>Tidak Ada Gambar</p>
                </div>
                @endif
                <div class="product-info">
                    <div class="product-title">{{ $product->nama }}</div>
                    <div class="product-status">{{ $product->status }}</div>
                    <div class="product-stok">Stok: {{ $product->stok }}</div>
                    <div class="product-price">Rp.{{ number_format($product->harga, 0, ',', '.') }}</div>
                    <div class="product-actions">
                        <a href="{{ route ('transaksi.create')}}" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Orders</a>
                        <a href="#" class="btn btn-secondary" data-nama="{{ $product->nama }}"
                         data-image="{{ asset( $product->gambar ) }}">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <div class="alert alert-danger text-center">Daftar Product belum Tersedia.</div>
        </div>
        @endforelse
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" alt="Product Image" id="productImage" class="img-fluid">
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            // Menampilkan modal dan mengatur sumber gambar dan judul saat tombol "Detail" diklik
            $('.btn-secondary').on('click', function () {
                var namaProduk = $(this).data('nama');
                var imageUrl = $(this).data('image');
                $('#productModalLabel').text(namaProduk); // Mengatur judul modal sesuai dengan nama produk
                $('#productImage').attr('src', imageUrl);
                $('#productModal').modal('show');
            });
        });
    </script>
@endsection
