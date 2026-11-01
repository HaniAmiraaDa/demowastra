<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" x-data="{ openAddModal: false, editModal: null, masukModal: null, keluarModal: null }">
    
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
      <div>
        <span class="text-xs font-bold uppercase tracking-widest text-yellow-800 bg-yellow-100 px-3 py-1 rounded-full">Panel Inventory</span>
        <h1 class="text-3xl font-black text-stone-900 mt-2">Manajemen Gudang Wastra</h1>
        <p class="text-stone-600 text-sm mt-1">Petugas gudang dapat memperbarui stok, harga, detail produk, serta transaksi barang masuk/keluar.</p>
      </div>
      <button @click="openAddModal = true" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-5 py-3 rounded-xl shadow-md transition flex items-center justify-center gap-2 text-sm">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Produk Baru
      </button>

      <a href="{{ route('admin.gudang.laporan') }}" class="bg-stone-900 hover:bg-stone-800 text-white font-semibold px-5 py-3 rounded-xl shadow-md transition flex items-center justify-center gap-2 text-sm">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
      Laporan Inventaris & Excel
    </a>
    </div>

    @if(session('success'))
      <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-sm font-medium shadow-sm">
        {{ session('success') }}
      </div>
    @endif

    @if($errors->any())
      <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl text-sm font-medium shadow-sm">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <!-- Tabel Daftar Produk Gudang -->
    <div class="bg-white rounded-3xl shadow-md border border-stone-200 overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-stone-100 text-stone-700 text-xs font-bold uppercase tracking-wider border-b border-stone-200">
              <th class="py-4 px-6">Produk</th>
              <th class="py-4 px-6">Kategori</th>
              <th class="py-4 px-6">Harga (Rp)</th>
              <th class="py-4 px-6 text-center">Stok Gudang</th>
              <th class="py-4 px-6 text-center">Aksi & Transaksi Gudang</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-stone-200 text-sm">
            @foreach($products as $product)
              
              <!-- Form terpisah untuk update cepat harga & stok per baris (Tanpa Nested Form) -->
              <form action="{{ route('admin.gudang.update', $product->id) }}" method="POST" id="quick-update-{{ $product->id }}">
                @csrf
                @method('PUT')
              </form>

              <tr class="hover:bg-stone-50 transition">
                <td class="py-4 px-6 flex items-center gap-3">
                  <img src="{{ asset($product->image) }}" class="w-12 h-12 object-cover rounded-xl border border-stone-200">
                  <div>
                    <span class="font-bold text-stone-900 block">{{ $product->name }}</span>
                    <span class="text-xs text-stone-500 line-clamp-1">{{ $product->desc }}</span>
                  </div>
                </td>
                <td class="py-4 px-6 text-stone-600 font-medium">{{ $product->category }}</td>
                
                <td class="py-4 px-6">
                  <input type="number" form="quick-update-{{ $product->id }}" name="price" value="{{ $product->price }}" class="w-32 px-3 py-2 rounded-xl border border-stone-300 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-red-500">
                </td>
                <td class="py-4 px-6 text-center">
                  <input type="number" form="quick-update-{{ $product->id }}" name="stock" value="{{ $product->stock }}" class="w-20 text-center px-3 py-2 rounded-xl border border-stone-300 text-sm font-bold focus:outline-none focus:ring-2 focus:ring-red-500">
                </td>
                <td class="py-4 px-6 text-center">
                  <div class="flex items-center justify-center gap-2">
                    <!-- Tombol Simpan Harga/Stok Cepat -->
                    <button type="submit" form="quick-update-{{ $product->id }}" class="bg-stone-900 hover:bg-stone-800 text-white font-semibold px-3 py-2 rounded-xl text-xs shadow transition">
                      Simpan
                    </button>

                    <!-- Tombol Edit Detail -->
                    <button type="button" @click="editModal = {{ $product->id }}" class="bg-amber-600 hover:bg-amber-700 text-white font-semibold px-3 py-2 rounded-xl text-xs shadow transition">
                      Edit
                    </button>

                    <!-- Tombol Barang Masuk -->
                    <button type="button" @click="masukModal = {{ $product->id }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-3 py-2 rounded-xl text-xs shadow transition">
                      + Masuk
                    </button>

                    <!-- Tombol Barang Keluar -->
                    <button type="button" @click="keluarModal = {{ $product->id }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-3 py-2 rounded-xl text-xs shadow transition">
                      - Keluar
                    </button>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <!-- ================= SEMUA MODAL DILETAKKAN DI LUAR TABEL (AMAN DARI NESTED FORM) ================= -->
    @foreach($products as $product)

      <!-- MODAL EDIT DETAIL PRODUK -->
      <div x-show="editModal === {{ $product->id }}" class="fixed inset-0 z-50 overflow-y-auto bg-stone-900/60 backdrop-blur-sm flex items-center justify-center p-4" x-cloak>
        <div @click.outside="editModal = null" class="bg-white rounded-3xl max-w-lg w-full overflow-hidden shadow-2xl p-6 text-left">
          <div class="flex justify-between items-center mb-4 pb-2 border-b border-stone-200">
            <h3 class="font-bold text-lg text-stone-900">Edit Detail: {{ $product->name }}</h3>
            <button @click="editModal = null" class="text-stone-400 hover:text-stone-700 font-bold text-lg">&✕</button>
          </div>

          <form action="{{ route('admin.gudang.updateDetails', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Nama Produk Kain</label>
              <input type="text" name="name" value="{{ $product->name }}" required class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>
            <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Kategori</label>
              <input type="text" name="category" value="{{ $product->category }}" required class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>
            <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Ganti Gambar Baru (Opsional)</label>
              <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 rounded-xl border border-stone-300 text-sm bg-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-red-50 file:text-red-700">
            </div>
            <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Deskripsi Kain</label>
              <textarea name="desc" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">{{ $product->desc }}</textarea>
            </div>
            <div class="pt-2 flex gap-3">
              <button type="submit" class="flex-1 bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-4 rounded-xl shadow-lg transition text-sm">
                Simpan Perubahan Detail
              </button>
              <button type="button" @click="editModal = null" class="bg-stone-200 hover:bg-stone-300 text-stone-700 font-bold py-3 px-4 rounded-xl transition text-sm">
                Batal
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- MODAL BARANG MASUK -->
      <div x-show="masukModal === {{ $product->id }}" class="fixed inset-0 z-50 overflow-y-auto bg-stone-900/60 backdrop-blur-sm flex items-center justify-center p-4" x-cloak>
        <div @click.outside="masukModal = null" class="bg-white rounded-3xl max-w-sm w-full overflow-hidden shadow-2xl p-6 text-left">
          <div class="flex justify-between items-center mb-4 pb-2 border-b border-stone-200">
            <h3 class="font-bold text-lg text-emerald-700">Barang Masuk: {{ $product->name }}</h3>
            <button @click="masukModal = null" class="text-stone-400 hover:text-stone-700 font-bold text-lg">&✕</button>
          </div>
          <form action="{{ route('admin.gudang.masuk', $product->id) }}" method="POST" class="space-y-4">
            @csrf
            <p class="text-xs text-stone-500">Stok Gudang Saat Ini: <strong class="text-stone-800">{{ $product->stock }} Pcs</strong></p>
            <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Jumlah Barang Masuk (Pcs)</label>
              <input type="number" name="jumlah" min="1" value="15" required class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 font-bold">
              <p class="text-[11px] text-stone-400 mt-1">Stok akan bertambah otomatis sesuai jumlah yang diatur.</p>
            </div>
            <div class="pt-2 flex gap-3">
              <button type="submit" class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-4 rounded-xl shadow-lg transition text-sm">
                Tambah Stok
              </button>
              <button type="button" @click="masukModal = null" class="bg-stone-200 hover:bg-stone-300 text-stone-700 font-bold py-3 px-4 rounded-xl transition text-sm">
                Batal
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- MODAL BARANG KELUAR -->
      <div x-show="keluarModal === {{ $product->id }}" class="fixed inset-0 z-50 overflow-y-auto bg-stone-900/60 backdrop-blur-sm flex items-center justify-center p-4" x-cloak>
        <div @click.outside="keluarModal = null" class="bg-white rounded-3xl max-w-sm w-full overflow-hidden shadow-2xl p-6 text-left">
          <div class="flex justify-between items-center mb-4 pb-2 border-b border-stone-200">
            <h3 class="font-bold text-lg text-red-700">Barang Keluar: {{ $product->name }}</h3>
            <button @click="keluarModal = null" class="text-stone-400 hover:text-stone-700 font-bold text-lg">&✕</button>
          </div>
          <form action="{{ route('admin.gudang.keluar', $product->id) }}" method="POST" class="space-y-4">
            @csrf
            <p class="text-xs text-stone-500">Stok Gudang Saat Ini: <strong class="text-stone-800">{{ $product->stock }} Pcs</strong></p>
            <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Jumlah Barang Keluar (Pcs)</label>
              <input type="number" name="jumlah" min="1" max="{{ $product->stock }}" value="15" required class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 font-bold">
              <p class="text-[11px] text-stone-400 mt-1">*Jumlah barang keluar tidak boleh melebihi stok gudang saat ini (Maks: {{ $product->stock }} Pcs).</p>
            </div>
            <div class="pt-2 flex gap-3">
              <button type="submit" class="flex-1 bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-4 rounded-xl shadow-lg transition text-sm">
                Kurangi Stok
              </button>
              <button type="button" @click="keluarModal = null" class="bg-stone-200 hover:bg-stone-300 text-stone-700 font-bold py-3 px-4 rounded-xl transition text-sm">
                Batal
              </button>
            </div>
          </form>
        </div>
      </div>

    @endforeach

    <!-- MODAL TAMBAH PRODUK BARU -->
    <div x-show="openAddModal" class="fixed inset-0 z-50 overflow-y-auto bg-stone-900/60 backdrop-blur-sm flex items-center justify-center p-4" x-cloak>
      <div @click.outside="openAddModal = false" class="bg-white rounded-3xl max-w-lg w-full overflow-hidden shadow-2xl p-6 text-left">
        <div class="flex justify-between items-center mb-4 pb-2 border-b border-stone-200">
          <h3 class="font-bold text-lg text-stone-900">Tambah Stok Kain Baru ke Gudang</h3>
          <button @click="openAddModal = false" class="text-stone-400 hover:text-stone-700 font-bold text-lg">&✕</button>
        </div>
        

        <form action="{{ route('admin.gudang.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
          @csrf
          <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Nama Produk Kain</label>
              <input type="text" name="name" required placeholder="Contoh: Kain Songket Palembang" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
          </div>
          <div class="grid grid-cols-2 gap-4">
              <div>
                  <label class="block text-xs font-semibold text-stone-700 mb-1">Kategori</label>
                  <input type="text" name="category" required placeholder="Contoh: Songket - Sumsel" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
              </div>
              <div>
                  <label class="block text-xs font-semibold text-stone-700 mb-1">Jumlah Stok Awal</label>
                  <input type="number" name="stock" required min="0" value="10" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
              </div>
          </div>
          <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Harga (Rp)</label>
              <input type="number" name="price" required placeholder="500000" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
          </div>
          <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Pilih Gambar Kain dari Laptop</label>
              <input type="file" name="image" accept="image/*" required class="w-full px-3 py-2 rounded-xl border border-stone-300 text-sm bg-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-red-50 file:text-red-700">
          </div>
          <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Deskripsi Kain</label>
              <textarea name="desc" rows="2" placeholder="Tuliskan filosofi dan detail kain..." class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
          </div>
          <div class="pt-2 flex gap-3">
              <button type="submit" class="flex-1 bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-4 rounded-xl shadow-lg transition text-sm">
                  Simpan ke Gudang
              </button>
              <button type="button" @click="openAddModal = false" class="bg-stone-200 hover:bg-stone-300 text-stone-700 font-bold py-3 px-4 rounded-xl transition text-sm">
                  Batal
              </button>
          </div>
        </form>
      </div>
    </div>

  </div>
</x-layout>