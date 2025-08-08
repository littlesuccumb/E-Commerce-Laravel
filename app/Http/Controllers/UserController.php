<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }


    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Autentikasi berhasil
        return redirect()->route('dashboard');
    } else {
        // Autentikasi gagal
        return back()->withErrors(['email' => 'Email atau password salah']);
    }
}

public function register(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Upload avatar jika ada
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('images/users', 'public');
        }

        // Buat pengguna baru
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'photo' => $photoPath
        ]);

        return redirect('login')->with('success', 'Anda telah berhasil Register.');

    }

    public function index()
    {
        $user = User::find(1); // Assuming you are fetching the user from the database
        return view('user.index', compact('user'));
    }

    public function dashboard()
    {
        $users = User::all();
        $products = Product::all();
        $totalUsers = User::count();
        $totalProduct = Product::count();
        $totalTransaksi = Transaksi::groupBy('notransaksi')->count();
        $totalNota = Transaksi::groupBy('notransaksi')->count();


         // Mengambil 3 pengguna terbaru dan produk dengan stok paling sedikit
        $recentUsers = User::orderBy('created_at', 'desc')->take(2)->get();
        $lowStockProducts = Product::orderBy('stok')->take(3)->get();
    
         // Ambil data transaksi terbaru dan grup berdasarkan notransaksi
        $recentTransaksi = Transaksi::orderBy('created_at', 'desc')
        ->take(5) // Ubah jumlah transaksi terbaru yang ingin ditampilkan sesuai kebutuhan
        ->get()
        ->groupBy('notransaksi'); 

        return view('dashboard', compact('users', 'products', 'totalUsers', 'totalProduct', 'recentUsers', 'lowStockProducts','recentTransaksi', 'totalTransaksi', 'totalNota'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('user.edit', compact('user'));
    }

 /**
 * Mengupdate data admin yang diubah
 */
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Validasi input dari form jika diperlukan
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        'password' => 'nullable|string|min:8',
    ]);

    // Update data admin
    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->password) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('user.index')->with('success', 'Admin berhasil diupdate');
}

/**
 * Mengupdate avatar admin yang diubah
 */
public function updatePhoto(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Validasi input avatar jika ada file yang diunggah
    $request->validate([
        'photo' => 'required|image|max:2048',
    ]);

    // Upload file avatar baru
    $photoPath = $request->file('photo')->store('images/users', 'public');
    $user->photo = $photoPath;
    $user->save();

    return redirect()->route('user.index')->with('success', 'Photo User berhasil diupdate');
}


    public function logout()
{
    Auth::logout();
    return redirect()->route('login')->with('success', 'Anda berhasil Logout!');
}

    // Metode lain sesuai kebutuhan Anda
}
