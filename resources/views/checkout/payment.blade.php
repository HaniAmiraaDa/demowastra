<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="max-w-3xl mx-auto px-4 py-12">
    <div class="bg-white rounded-3xl shadow-xl border border-stone-200 overflow-hidden p-8">
      <div class="text-center pb-6 border-b border-stone-200">
        <span class="text-xs font-bold uppercase tracking-widest text-yellow-800 bg-yellow-100 px-3 py-1 rounded-full">Selesaikan Pembayaran</span>
        <h1 class="text-2xl font-black text-stone-900 mt-2">Instruksi Transfer Pembayaran</h1>
        <p class="text-stone-600 text-sm mt-1">Silakan lakukan transfer sesuai total tagihan di bawah ini.</p>
      </div>

      <!-- Ringkasan Tagihan -->
      <div class="py-6 flex items-center justify-between border-b border-stone-200">
        <div>
          <h4 class="font-bold text-stone-900">{{ $order->product->name }}</h4>
          <p class="text-xs text-stone-500">Jumlah: {{ $order->quantity }} Pcs | Pemesan: {{ $order->customer_name }}</p>
        </div>
        <div class="text-right">
          <span class="text-xs text-stone-500 block">Total Tagihan</span>
          <span class="text-xl font-black text-red-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
        </div>
      </div>

      <!-- Rekening / QRIS -->
      <div class="py-6 space-y-4">
        <h3 class="font-bold text-stone-800 text-sm">Pilih Metode Transfer Bank / E-Wallet:</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="p-4 rounded-2xl border-2 border-red-500 bg-red-50/50">
            <span class="font-bold text-stone-900 block">BCA (Bank Central Asia)</span>
            <span class="text-lg font-mono font-extrabold text-stone-800">1234-5678-9012</span>
            <span class="text-xs text-stone-500 block mt-1">a.n. Wastra Indonesia Official</span>
          </div>
          <div class="p-4 rounded-2xl border border-stone-200 bg-stone-50">
            <span class="font-bold text-stone-900 block">Mandiri / QRIS</span>
            <span class="text-lg font-mono font-extrabold text-stone-800">9876-5432-1098</span>
            <span class="text-xs text-stone-500 block mt-1">a.n. Wastra Indonesia Official</span>
          </div>
        </div>
      </div>

      <!-- Tombol Konfirmasi Bayar -->
      <form action="{{ route('checkout.confirm', $order->id) }}" method="POST" class="pt-4">
        @csrf
        <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 px-6 rounded-2xl shadow-lg transition text-base flex items-center justify-center gap-2">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          Saya Sudah Melakukan Pembayaran
        </button>
      </form>
    </div>
  </div>
</x-layout>