<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- Navigation & Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
      <div>
        <a href="{{ route('admin.gudang') }}" class="text-xs font-bold text-red-600 hover:text-red-700 flex items-center gap-1 mb-2">
          &larr; Kembali ke Manajemen Gudang
        </a>
        <h1 class="text-3xl font-black text-stone-900">Laporan Barang Masuk & Keluar</h1>
        <p class="text-stone-600 text-sm mt-1">Rekap riwayat transaksi inventaris gudang dan status stok saat ini.</p>
      </div>

      <!-- Tombol Download Excel -->
      <a href="{{ route('admin.gudang.laporan.export', ['month' => $selectedMonth, 'year' => $selectedYear]) }}" 
         class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-5 py-3 rounded-xl shadow-md transition flex items-center justify-center gap-2 text-sm">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        Download Laporan Excel
      </a>
    </div>

    <!-- Summary Cards (Stok Saat Ini) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="bg-white p-6 rounded-3xl shadow-sm border border-stone-200">
        <span class="text-xs font-bold text-stone-500 uppercase tracking-wider block mb-1">Total Jenis Produk</span>
        <span class="text-3xl font-black text-stone-900">{{ $products->count() }} Jenis</span>
      </div>

      <div class="bg-white p-6 rounded-3xl shadow-sm border border-stone-200">
        <span class="text-xs font-bold text-emerald-600 uppercase tracking-wider block mb-1">Total Barang Masuk (Filtered)</span>
        <span class="text-3xl font-black text-emerald-600">+ {{ $transactions->where('type', 'masuk')->sum('amount') }} Pcs</span>
      </div>

      <div class="bg-white p-6 rounded-3xl shadow-sm border border-stone-200">
        <span class="text-xs font-bold text-red-600 uppercase tracking-wider block mb-1">Total Barang Keluar (Filtered)</span>
        <span class="text-3xl font-black text-red-600">- {{ $transactions->where('type', 'keluar')->sum('amount') }} Pcs</span>
      </div>
    </div>

    <!-- Form Filter Bulan & Tahun -->
    <div class="bg-white p-6 rounded-3xl shadow-sm border border-stone-200 mb-8">
      <form action="{{ route('admin.gudang.laporan') }}" method="GET" class="flex flex-wrap items-end gap-4">
        <div>
          <label class="block text-xs font-semibold text-stone-700 mb-1">Filter Bulan</label>
          <select name="month" class="px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
            <option value="">Semua Bulan</option>
            @for ($m = 1; $m <= 12; $m++)
              <option value="{{ sprintf('%02d', $m) }}" {{ $selectedMonth == sprintf('%02d', $m) ? 'selected' : '' }}>
                {{ date('F', mktime(0, 0, 0, $m, 1)) }}
              </option>
            @endfor
          </select>
        </div>

        <div>
          <label class="block text-xs font-semibold text-stone-700 mb-1">Filter Tahun</label>
          <select name="year" class="px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
            @for ($y = date('Y'); $y >= 2024; $y--)
              <option value="{{ $y }}" {{ $selectedYear == $y ? 'selected' : '' }}>{{ $y }}</option>
            @endfor
          </select>
        </div>

        <button type="submit" class="bg-stone-900 hover:bg-stone-800 text-white font-bold px-5 py-2.5 rounded-xl text-sm transition">
          Terapkan Filter
        </button>
        <a href="{{ route('admin.gudang.laporan') }}" class="bg-stone-100 hover:bg-stone-200 text-stone-700 font-bold px-4 py-2.5 rounded-xl text-sm transition">
          Reset
        </a>
      </form>
    </div>

    <!-- Tabel Riwayat Transaksi Stock -->
    <div class="bg-white rounded-3xl shadow-md border border-stone-200 overflow-hidden mb-12">
      <div class="px-6 py-4 border-b border-stone-200 bg-stone-50 flex justify-between items-center">
        <h3 class="font-bold text-stone-900">Riwayat Transaksi</h3>
        <span class="text-xs text-stone-500">Total Transaksi: {{ $transactions->count() }} Data</span>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-stone-100 text-stone-700 text-xs font-bold uppercase tracking-wider border-b border-stone-200">
              <th class="py-4 px-6">Tanggal & Waktu</th>
              <th class="py-4 px-6">Nama Produk</th>
              <th class="py-4 px-6 text-center">Jenis</th>
              <th class="py-4 px-6 text-center">Jumlah</th>
              <th class="py-4 px-6 text-center">Stok Sebelum</th>
              <th class="py-4 px-6 text-center">Stok Sesudah</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-stone-200 text-sm">
            @forelse($transactions as $trx)
              <tr class="hover:bg-stone-50 transition">
                <td class="py-4 px-6 text-stone-600 font-medium">
                  {{ \Carbon\Carbon::parse($trx->transaction_date)->translatedFormat('d F Y - H:i') }}
                </td>
                <td class="py-4 px-6 font-bold text-stone-900">
                  {{ $trx->product->name ?? 'Produk Dihapus' }}
                </td>
                <td class="py-4 px-6 text-center">
                  @if($trx->type === 'masuk')
                    <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-2.5 py-1 rounded-full">BARANG MASUK</span>
                  @else
                    <span class="bg-red-100 text-red-800 text-xs font-bold px-2.5 py-1 rounded-full">BARANG KELUAR</span>
                  @endif
                </td>
                <td class="py-4 px-6 text-center font-extrabold {{ $trx->type === 'masuk' ? 'text-emerald-600' : 'text-red-600' }}">
                  {{ $trx->type === 'masuk' ? '+' : '-' }}{{ $trx->amount }} Pcs
                </td>
                <td class="py-4 px-6 text-center text-stone-500 font-semibold">{{ $trx->stock_before }} Pcs</td>
                <td class="py-4 px-6 text-center text-stone-900 font-bold">{{ $trx->stock_after }} Pcs</td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="py-8 text-center text-stone-500 text-sm">Belum ada transaksi barang masuk/keluar pada periode ini.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <!-- Tabel Status Stock Saat Ini -->
    <div class="bg-white rounded-3xl shadow-md border border-stone-200 overflow-hidden">
      <div class="px-6 py-4 border-b border-stone-200 bg-stone-50">
        <h3 class="font-bold text-stone-900">Status Stok Produk Saat Ini</h3>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-stone-100 text-stone-700 text-xs font-bold uppercase tracking-wider border-b border-stone-200">
              <th class="py-4 px-6">Produk</th>
              <th class="py-4 px-6">Kategori</th>
              <th class="py-4 px-6">Harga (Rp)</th>
              <th class="py-4 px-6 text-center">Stok Saat Ini</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-stone-200 text-sm">
            @foreach($products as $product)
              <tr class="hover:bg-stone-50 transition">
                <td class="py-4 px-6 font-bold text-stone-900">{{ $product->name }}</td>
                <td class="py-4 px-6 text-stone-600">{{ $product->category }}</td>
                <td class="py-4 px-6 font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td class="py-4 px-6 text-center font-extrabold text-emerald-600">{{ $product->stock }} Pcs</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
</x-layout>