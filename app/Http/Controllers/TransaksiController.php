<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;




class TransaksiController extends Controller
{
    public function index(): View
    {
        $transaksis = Transaksi::with('products')->get()->groupBy('notransaksi');
    
        return view('transaksi.index', compact('transaksis'));
    }
    
    
    public function laporan()
    {
        $transaksis = Transaksi::with('products')->get()->groupBy('notransaksi');
    
        return view('transaksi.laporan', compact('transaksis'));
    }
    

    public function create(): View
    {
        $products = Product::where('status', 'Tersedia')->get();
        $transaksis = Transaksi::all();

        $tanggal = Carbon::now()->format('Ymd');
        $notransaksi = 'TRX-' . $tanggal;
        return view('transaksi.create', compact('products', 'transaksis','notransaksi'));
    }

    public function store(Request $request): RedirectResponse
{
    date_default_timezone_set('Asia/Jakarta');
    $notransaksi = date('ymdHis');

    foreach ($request->input('products', []) as $productId => $data) {
        if (isset($data['qty']) && $data['qty'] > 0) {
            $product = Product::findOrFail($productId);

            $transaksi = Transaksi::where('product_id', $product->id)
                ->where('notransaksi', $notransaksi)
                ->first();

            $qty = $data['qty'];

            if ($transaksi) {
                $transaksi->qty += $qty;
                $transaksi->total_harga += ($qty * $product->harga);
                $transaksi->save();
            } else {
                $transaksi = new Transaksi([
                    'notransaksi' => $notransaksi,
                    'product_id' => $product->id,
                    'qty' => $qty,
                    'total_harga' => $qty * $product->harga,
                ]);

                $product->transaksis()->save($transaksi);
            }

            // Kurangi stok produk
            $product->stok -= $qty;

            // Cek apakah stok menjadi 0 atau kurang, jika ya, ubah status menjadi "Tidak Tersedia"
            if ($product->stok <= 0) {
                $product->status = 'Tidak Tersedia';
            }

            $product->save();
        }
    }

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
}

    
    
    public function destroy($id): RedirectResponse
    {
        $transaksi = Transaksi::findOrFail($id);
        $productId = $transaksi->product_id;
        $qty = $transaksi->qty;
    
        $transaksi->delete();
    
        $product = Product::findOrFail($productId);
        $product->stok += $qty;
        $product->status = 'Tersedia';
        $product->save();
    
        return redirect()->route('transaksi.index')->with('success', 'Data transaksi berhasil dihapus.');
    }



public function search(Request $request)
{
    $search = $request->input('search');

    $transaksis = Transaksi::with('products')
        ->where(function ($query) use ($search) {
            $query->where('notransaksi', 'LIKE', "%$search%")
                ->orWhereHas('products', function ($query) use ($search) {
                    $query->where('nama', 'LIKE', "%$search%");
                });
        })
        ->get()
        ->groupBy('notransaksi');

    return view('transaksi.index', compact('transaksis'));
}
    
public function searchLaporan(Request $request)
{
    $search = $request->input('search');

    $transaksis = Transaksi::with('products')
        ->where(function ($query) use ($search) {
            $query->where('notransaksi', 'LIKE', "%$search%")
                ->orWhereHas('products', function ($query) use ($search) {
                    $query->where('nama', 'LIKE', "%$search%");
                });
        })
        ->get()
        ->groupBy('notransaksi');

    return view('transaksi.laporan', compact('transaksis'));
}


}