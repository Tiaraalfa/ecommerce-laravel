<?php

namespace App\Http\Controllers;
use App\Models\Barang;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
    public function userDashboard()
        {
            $barang = Barang::all();
        return view('user.dashboard', compact('barang'));
        }
//     public function index()
// {
//     return redirect()->route('dashboard');
// }
    // public function index()
    // {
    //     $produk = Barang::all();
    //     return view('user.dashboard', compact('produk'));
    // }
}
