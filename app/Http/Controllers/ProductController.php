<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::where('status', 'Tersedia')->get();
    
        return view('product.index', compact('products'));
    }
    
    public function catalog(): View
    {
        $products = Product::all(); // Mengambil semua data produk dari database

        return view('product.catalog', compact('products'));
    }
    
    public function destroy($id): RedirectResponse
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
    public function create(): View
    {
        return view('product.create');
    }

    public function store(Request $request)
{
    $this->validate($request, [
        'nama' => 'required',
        'status' => 'required',
        'stok' => 'required|numeric',
        'harga' => 'required',
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // validasi untuk gambar
    ]);

    // Upload avatar jika ada
    $gambarPath = null;
    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $gambarPath = $gambar->store('images/product', 'public');
    }

    // Simpan data product
    $product = new Product();
    $product->nama = $request->nama;
    $product->status = $request->status;
    $product->stok = $request->stok;
    $product->harga = $request->harga;
    $product->gambar = $gambarPath; 

    $product->save();

    return redirect()->route('product.index')->with(['success' => 'Data Berhasil Disimpan!']);
}


    public function edit($id): View
    {
        $product = Product::findOrFail($id);

        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id): RedirectResponse
{
    $product = Product::findOrFail($id);

    $this->validate($request, [
        'nama' => 'required',
        'status' => 'required',
        'stok' => 'required|numeric',
        'harga' => 'required',
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    $data = [
        'nama' => $request->nama,
        'status' => $request->status,
        'stok' => $request->stok,
        'harga' => $request->harga,
    ];

    // Upload file gambar baru jika ada
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama sebelum menyimpan gambar yang baru
        if ($product->gambar) {
            Storage::delete($product->gambar);
        }
        
        $imagePath = $request->file('gambar')->store('images/product', 'public');
        $data['gambar'] = $imagePath;
    }

    $product->update($data);

    return redirect()->route('product.index')->with(['success' => 'Data Berhasil Diubah!']);
}


    public function search(Request $request)
    {
        $search = $request->input('search');

        $products = Product::where('nama', 'LIKE', "%$search%")
            ->orWhere('status', 'LIKE', "%$search%")
            ->orWhere('stok', 'LIKE', "%$search%")
            ->orWhere('harga', 'LIKE', "%$search%")
            ->get();

        return view('product.index', compact('products'));
    }
}