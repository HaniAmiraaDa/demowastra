<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Simpan data checkout & arahkan ke halaman pembayaran
    public function store(Request $request)
    {
        $request->validate([
            'product_id'       => 'required|exists:products,id',
            'customer_name'    => 'required|string|max:255',
            'customer_phone'   => 'required|string|max:20',
            'customer_address' => 'required|string',
            'quantity'         => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stock < $request->quantity) {
            return back()->withErrors(['quantity' => 'Stok tidak mencukupi.'])->withInput();
        }

        $order = Order::create([
            'product_id'       => $product->id,
            'customer_name'    => $request->customer_name,
            'customer_phone'   => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'quantity'         => $request->quantity,
            // Total dihitung di server, bukan dari input browser
            'total_price'      => $product->price * $request->quantity,
            'status'           => 'pending',
        ]);

        return redirect()->route('checkout.payment', $order->id);
    }

    // Tampilkan Halaman Pembayaran
    public function payment(Order $order)
    {
        return view('checkout.payment', [
            'title' => 'Pembayaran Pesanan Wastra',
            'order' => $order->load('product'),
        ]);
    }

    // Proses Konfirmasi Pembayaran & Buat Link WhatsApp Struk
    public function confirmPayment(Order $order)
    {
        $order->update(['status' => 'paid']);
        $order->loadMissing('product');

        // Format nomor HP (ubah 08... menjadi 628...)
        $phone = preg_replace('/\D+/', '', $order->customer_phone);
        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }

        $receiptText = $this->buildReceipt($order);

        return view('checkout.success', [
            'title'       => 'Pembayaran Berhasil',
            'order'       => $order,
            // rawurlencode wajib supaya karakter # dan baris baru tidak merusak link
            'whatsappUrl' => "https://wa.me/{$phone}?text=" . rawurlencode($receiptText),
        ]);
    }

    // Susun teks struk digital
    private function buildReceipt(Order $order): string
    {
        $line = "━━━━━━━━━━━━━━━━━━━━";

        return "*STRUK PEMBELIAN*\n" .
               "*WASTRA INDONESIA*\n" .
               "{$line}\n" .
               "No. Pesanan: *#TRX-{$order->id}*\n" .
               "Tanggal: " . now()->format('d-m-Y H:i') . " WIB\n" .
               "Status Pembayaran: *LUNAS ✅*\n" .
               "{$line}\n\n" .
               "*DATA PEMESAN*\n" .
               "Nama: {$order->customer_name}\n" .
               "No. WhatsApp: {$order->customer_phone}\n" .
               "Alamat Pengiriman: {$order->customer_address}\n\n" .
               "*RINCIAN PESANAN*\n" .
               "Produk: {$order->product->name}\n" .
               "Kategori: {$order->product->category}\n" .
               "Harga Satuan: Rp " . number_format($order->product->price, 0, ',', '.') . "\n" .
               "Jumlah: {$order->quantity} Pcs\n" .
               "{$line}\n" .
               "*TOTAL BAYAR: Rp " . number_format($order->total_price, 0, ',', '.') . "*\n" .
               "{$line}\n\n" .
               "Terima kasih telah berbelanja di Wastra Indonesia. Pesanan Anda akan segera kami proses dan kirim.";
    }
}