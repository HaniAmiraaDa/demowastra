<?php

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\WarehouseController;
use App\Models\Product;
use App\Http\Controllers\OrderController;



//ini buat rute page nya aja
Route::get('/', function () {
    return view('home', ['title' => 'Welcome To Wastra Indonesia' ]);
});

Route::get('/about', function () {  //membuat file about.blade.php
    return view('about', ['title' => 'Tentang Kami']); //mengirim data array (nama) ke view about 
});

Route::get('/galeri', function () {  //membuat file blog.blade.php
    return view('galeri', ['title' => 'Galeri']); //mengirim data array (nama) ke view about 
});

Route::get('/kontak', function () {  //membuat file blog.blade.php
    return view('kontak', ['title' => 'Info Kontak']); //mengirim data array (nama) ke view about 
}); 

Route::get('/produk', function () {  //membuat file blog.blade.php
    return view('produk', ['title' => 'Kain Indonesia']); //mengirim data array (nama) ke view about 
}); 

Route::get('/posts', function () {  //membuat file blog.blade.php
    return view('posts', ['title' => 'Berita Terkini', 'posts' => Post::all()]); //mengirim data array (nama) ke view about 
}); 

Route::get('/posts/{slug}', function ($slug) {
   

    $post = Post::find($slug);

   return view('post', ['title' => 'Berita', 'post' => $post]);
});


Route::get('/admin/gudang', [WarehouseController::class, 'index'])->name('admin.gudang');
Route::post('/admin/gudang', [WarehouseController::class, 'store'])->name('admin.gudang.store');
Route::put('/admin/gudang/{product}', [WarehouseController::class, 'update'])->name('admin.gudang.update');

// --- ROUTE TAMBAHAN ADMIN GUDANG ---
Route::put('/admin/gudang/{product}/details', [WarehouseController::class, 'updateDetails'])->name('admin.gudang.updateDetails');
Route::post('/admin/gudang/{product}/masuk', [WarehouseController::class, 'barangMasuk'])->name('admin.gudang.masuk');
Route::post('/admin/gudang/{product}/keluar', [WarehouseController::class, 'barangKeluar'])->name('admin.gudang.keluar');

// Route Halaman Laporan & Export Excel
Route::get('/admin/gudang/laporan', [WarehouseController::class, 'laporan'])->name('admin.gudang.laporan');
Route::get('/admin/gudang/laporan/export', [WarehouseController::class, 'exportExcel'])->name('admin.gudang.laporan.export');

Route::post('/checkout/store', [OrderController::class, 'store'])->name('checkout.store');
Route::get('/checkout/payment/{order}', [OrderController::class, 'payment'])->name('checkout.payment');
Route::post('/checkout/confirm/{order}', [OrderController::class, 'confirmPayment'])->name('checkout.confirm');

// Route untuk Halaman Koleksi Wastra
Route::get('/produk', function () {
    return view('produk', [
        'title' => 'Koleksi Wastra',
        'products' => Product::all()
    ]);
});

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
        'products' => Product::take(4)->get() // Mengambil data produk dari database gudang
    ]);
});