@extends('layouts.app')

@section('title', 'INPUT DATA')

@section('content')
<div class="card mb-3 shadow">
    <div class="card-body">
        <h2 class="mb-0">Input Product</h2>
    </div>
</div>
<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Product</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Product">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="">--Pilih Status--</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="text" class="form-control" name="stok" id="stok" placeholder="Masukkan Stok">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukan Harga">
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
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
                <i class="fas fa-save"></i> Save
            </button>
            <button type="reset" class="btn btn-warning">
                <i class="fas fa-redo"></i> Reset
            </button>
        </form>
    </div>
</div>
@endsection
