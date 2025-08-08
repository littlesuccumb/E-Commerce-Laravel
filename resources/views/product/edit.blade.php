@extends('layouts.app')

@section('title', 'EDIT PRODUCT')

@section('content')
<div class="card shadow mb-3">
    <div class="card-body">
        <h2 class="mb-0">EDIT PRODUCT</h2>
    </div>
</div>
<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Product</label>
                <input type="text" class="form-control" name="nama" id="nama" value="{{ $product->nama }}">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="Tersedia" {{ $product->status == 'Tersedia' ? 'selected' : '' }}>
                        Tersedia
                    </option>
                    <option value="Tidak Tersedia" {{ $product->status == 'Tidak Tersedia' ? 'selected' : '' }}>
                        Tidak Tersedia
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="text" class="form-control" name="stok" id="stok" placeholder="Masukkan Stok"
                    value="{{ $product->stok }}">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukan Harga"
                    value="{{ $product->harga }}">
            </div>
            <div class="mb-3">
                @if($product->gambar)
                    <img src="{{ asset($product->gambar) }}" alt="Gambar Produk" width="70" class="mb-3">
                @else
                    <p>Tidak Ada Gambar</p>
                @endif
                <input type="file" class="form-control" name="gambar" id="gambar">
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-sync"></i> Update
            </button>
            <button type="reset" class="btn btn-warning">
                <i class="fas fa-redo"></i> Reset
            </button>
        </form>
    </div>
</div>
<br>
@endsection
