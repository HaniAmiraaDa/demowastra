<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\StockTransaction;
use App\Exports\StockReportExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WarehouseController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.gudang', [
            'title' => 'Admin Gudang - Wastra Indonesia',
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'desc' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $cleanName = preg_replace('/[^A-Za-z0-9_]/', '_', $originalName);
            $filename = time() . '_' . $cleanName . '.' . $file->getClientOriginalExtension();

            if (!file_exists(public_path('image'))) {
                mkdir(public_path('image'), 0777, true);
            }

            $file->move(public_path('image'), $filename);
            $imagePath = 'image/' . $filename;
        }

        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
            'desc' => $request->desc,
        ]);

        return redirect()->route('admin.gudang')->with('success', 'Produk dan gambar berhasil ditambahkan!');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric',
        ]);

        $product->update([
            'stock' => $request->stock,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.gudang')->with('success', 'Stok dan harga berhasil diperbarui!');
    }

    public function updateDetails(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $cleanName = preg_replace('/[^A-Za-z0-9_]/', '_', $originalName);
            $filename = time() . '_' . $cleanName . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('image'), $filename);
            $imagePath = 'image/' . $filename;
        }

        $product->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.gudang')->with('success', 'Detail produk berhasil diperbarui!');
    }

    // Method Barang Masuk dengan pencatatan riwayat transaksi
    public function barangMasuk(Request $request, Product $product)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1'
        ]);

        $stockBefore = $product->stock;
        $stockAfter = $stockBefore + $request->jumlah;

        $product->stock = $stockAfter;
        $product->save();

        // Catat ke riwayat transaksi
        StockTransaction::create([
            'product_id' => $product->id,
            'type' => 'masuk',
            'amount' => $request->jumlah,
            'stock_before' => $stockBefore,
            'stock_after' => $stockAfter,
            'transaction_date' => now(),
        ]);

        return redirect()->route('admin.gudang')->with('success', "Stok berhasil ditambah sebanyak {$request->jumlah} Pcs!");
    }

    // Method Barang Keluar dengan pencatatan riwayat transaksi
    public function barangKeluar(Request $request, Product $product)
    {
        $request->validate([
            'jumlah' => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) use ($product) {
                    if ($value > $product->stock) {
                        $fail('Jumlah barang keluar tidak boleh melebihi stok gudang saat ini (' . $product->stock . ').');
                    }
                },
            ],
        ]);

        $stockBefore = $product->stock;
        $stockAfter = $stockBefore - $request->jumlah;

        $product->stock = $stockAfter;
        $product->save();

        // Catat ke riwayat transaksi
        StockTransaction::create([
            'product_id' => $product->id,
            'type' => 'keluar',
            'amount' => $request->jumlah,
            'stock_before' => $stockBefore,
            'stock_after' => $stockAfter,
            'transaction_date' => now(),
        ]);

        return redirect()->route('admin.gudang')->with('success', "Stok berhasil dikurangi sebanyak {$request->jumlah} Pcs!");
    }

    // Halaman khusus Laporan Inventaris
    public function laporan(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year', date('Y'));

        $query = StockTransaction::with('product');

        if ($month) {
            $query->whereMonth('transaction_date', $month);
        }

        if ($year) {
            $query->whereYear('transaction_date', $year);
        }

        $transactions = $query->latest('transaction_date')->get();
        $products = Product::all();

        return view('admin.laporan', [
            'title' => 'Laporan Inventaris Gudang',
            'transactions' => $transactions,
            'products' => $products,
            'selectedMonth' => $month,
            'selectedYear' => $year,
        ]);
    }

    // Export Excel
    public function exportExcel(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $fileName = 'Laporan_Stok_Gudang_' . ($month ? "Bulan_{$month}_" : "") . "Tahun_{$year}.xlsx";

        return Excel::download(new StockReportExport($month, $year), $fileName);
    }
}