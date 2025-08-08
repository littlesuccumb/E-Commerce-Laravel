@extends('layouts.app')

@section('title', 'ORDER')

@section('content')
<div class="card mb-3 shadow">
    <div class="card-body d-flex justify-content-between">
        <h2><i class="fa fa-shopping-cart"></i>&nbsp; ORDERS</h2>
    </div>
</div>
    <br>
    <main class="container">
    <div class="card shadow">
        <div class="card-body">
        <form action="{{ route('transaksi.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <label for="product_id" hidden class="form-label" style="color: black; font-size: 16px;">Nama Produk</label>
                    </div>
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-4 mb-4 mt-4">
                                <div class="card" style="width: 270px;">
                                    <img src="{{ asset($product->gambar) }}" alt="{{ $product->nama }}" class="card-img-top img-fluid">
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="products[{{ $product->id }}][selected]"
                                                value="1" id="product{{ $product->id }}">
                                            <label class="form-check-label" for="product{{ $product->id }}" style="color: black; font-size: 16px;">
                                                {{ $product->nama }}
                                            </label>
                                            <p class="mb-2 mt-2" style="color: black; font-size: 16px;"> Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                                            <p class="mb-2 mt-2" style="color: black; font-size: 16px;"> Stok : {{ $product->stok }}</p>
                                        </div>
                                        <input type="number" class="form-control" name="products[{{ $product->id }}][qty]"
                                            placeholder="Masukkan Jumlah" min="1">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-shopping-cart"></i>&nbsp; Order
                    </button>
                    <button type="reset" class="btn btn-warning">
                        <i class="fa fa-undo"></i>&nbsp; Reset
                    </button>
                </div>
            </div>
        </form>
    </main>
@endsection
