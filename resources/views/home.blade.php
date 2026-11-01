<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <!-- Hero Section Modern E-Commerce -->
  <div class="relative isolate px-4 pt-6 lg:px-8 overflow-hidden">
    <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-50">
      <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#FFDF88] to-[#7B4019] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"></div>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center py-12">
      <!-- Left Column: Text & CTA -->
      <div class="lg:col-span-7 text-center lg:text-left">
        <div class="inline-flex items-center gap-x-2 rounded-full px-3 py-1 text-sm font-medium text-stone-800 bg-yellow-100 ring-1 ring-yellow-300 mb-6">
          <span class="flex h-2 w-2 rounded-full bg-red-500"></span>
          Koleksi Kain Tradisional Indonesia Autentik
          <a href="/produk" class="font-semibold text-yellow-700 hover:text-yellow-800 ml-1">Jelajahi <span aria-hidden="true">&rarr;</span></a>
        </div>
        <h1 class="text-4xl font-extrabold tracking-tight text-stone-900 sm:text-6xl text-balance">
          WASTRA INDONESIA
        </h1>
        <p class="mt-6 text-lg font-normal text-stone-600 sm:text-xl leading-relaxed">
          Mengungkap Kisah, Seni, dan Filosofi di Setiap Helai Benang. Temukan keindahan kain nusantara berkualitas tinggi langsung dari pengrajin lokal.
        </p>
        <div class="mt-8 flex flex-wrap items-center justify-center lg:justify-start gap-4">
          <a href="/produk" class="rounded-xl bg-red-600 px-6 py-3.5 text-sm font-semibold text-white shadow-md hover:bg-red-700 transition-all duration-200 transform hover:-translate-y-0.5">
            Mulai Belanja
          </a>
          <a href="#definisi" class="rounded-xl bg-white px-6 py-3.5 text-sm font-semibold text-stone-700 shadow-sm ring-1 ring-stone-300 hover:bg-stone-50 transition-all duration-200">
            Pelajari Wastra &rarr;
          </a>
        </div>
      </div>

      <!-- Right Column: Featured Image Display -->
      <div class="lg:col-span-5 grid grid-cols-2 gap-4 relative">
        <div class="space-y-4">
          <div class="overflow-hidden rounded-2xl shadow-lg border-2 border-yellow-200 aspect-square group">
            <img src="{{ asset('image/ulos.jpg') }}" alt="Ulos" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
          </div>
          <div class="overflow-hidden rounded-2xl shadow-lg border-2 border-yellow-200 aspect-[4/3] group">
            <img src="{{ asset('image/tapis.jpg') }}" alt="Tapis" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
          </div>
        </div>
        <div class="space-y-4 pt-6">
          <div class="overflow-hidden rounded-2xl shadow-lg border-2 border-yellow-200 aspect-[4/3] group">
            <img src="{{ asset('image/batik.jpg') }}" alt="Batik" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
          </div>
          <div class="overflow-hidden rounded-2xl shadow-lg border-2 border-yellow-200 aspect-square group">
            <img src="{{ asset('image/tenun1.jpg') }}" alt="Tenun" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Definisi Wastra Section -->
  <div id="definisi" class="bg-stone-900 py-16 px-4 sm:px-6 lg:px-8 my-10 rounded-3xl mx-4 sm:mx-6 lg:mx-8 shadow-2xl relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#FFDF88_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-5xl mx-auto relative z-10">
      <div class="bg-gradient-to-r from-yellow-100 via-yellow-50 to-white rounded-2xl shadow-xl p-8 lg:p-12 border border-yellow-300/50">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
          <div class="md:col-span-5 text-center md:text-left">
            <span class="text-xs font-bold uppercase tracking-widest text-yellow-800 bg-yellow-200/60 px-3 py-1 rounded-full">Filosofi Budaya</span>
            <h2 class="text-3xl sm:text-4xl font-black text-stone-900 mt-3 tracking-tight">
              DEFINISI WASTRA
            </h2>
          </div>
          <div class="md:col-span-7">
            <p class="text-base sm:text-lg text-stone-700 leading-relaxed text-justify">
              Wastra adalah istilah yang berasal dari Bahasa Sansekerta yang berarti kain tradisional. Kain wastra memiliki makna dan simbol tersendiri yang mengacu pada dimensi warna, ukuran, dan bahan. Contoh wastra yang ada di Indonesia meliputi batik, tenun, dan songket. Wastra tidak hanya sekadar kain penutup tubuh, tetapi juga mencerminkan nilai-nilai budaya dan sejarah masing-masing daerah di Indonesia.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data='{ 
  selectedProduct: null, 
  isCheckoutModalOpen: false, 
  isDetailModalOpen: false,
  quantity: 1,
  customerName: "",
  customerPhone: "",
  customerAddress: "",
  formatRupiah(angka) {
    return "Rp " + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }
}'>
  
  <div class="flex justify-between items-end mb-8">
    <div>
      <span class="text-xs font-bold uppercase tracking-widest text-yellow-800 bg-yellow-100 px-3 py-1 rounded-full">Katalog Unggulan</span>
      <h2 class="text-3xl font-black text-stone-900 mt-2">Preview Produk Wastra</h2>
    </div>
    <a href="/produk" class="text-red-600 hover:text-red-700 font-bold text-sm flex items-center gap-1 transition">
      Lihat Semua Koleksi &rarr;
    </a>
  </div>

  <!-- Grid Produk Dinamis dari Database Gudang -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach($products as $product)
      <div class="bg-white rounded-2xl shadow-md border border-stone-200/80 overflow-hidden hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
        <div>
          <div class="relative overflow-hidden aspect-square bg-stone-100">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
            <span class="absolute top-3 left-3 bg-stone-900/70 backdrop-blur-md text-white text-xs font-medium px-2.5 py-1 rounded-full">{{ $product->category }}</span>
            
            <!-- Badge Indikator Stok Gudang Otomatis -->
            <span class="absolute bottom-3 right-3 {{ $product->stock > 0 ? 'bg-emerald-600' : 'bg-red-600' }} text-white text-xs font-bold px-2.5 py-1 rounded-full shadow">
              Stok Gudang: {{ $product->stock }}
            </span>
          </div>
          <div class="p-5">
            <h3 class="font-bold text-stone-900 text-lg mb-1 line-clamp-1">{{ $product->name }}</h3>
            <p class="text-red-600 font-extrabold text-lg mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="text-stone-600 text-sm line-clamp-2">{{ $product->desc }}</p>
          </div>
        </div>
        
        <div class="p-5 pt-0 grid grid-cols-2 gap-2">
          <button @click="selectedProduct = {
            id: {{ $product->id }},
            name: '{{ $product->name }}',
            category: '{{ $product->category }}',
            rawPrice: {{ $product->price }},
            price: 'Rp {{ number_format($product->price, 0, ',', '.') }}',
            stock: {{ $product->stock }},
            image: '{{ asset($product->image) }}',
            desc: '{{ addslashes($product->desc) }}'
          }; isDetailModalOpen = true" class="w-full bg-stone-100 hover:bg-stone-200 text-stone-800 text-xs font-semibold py-2.5 px-3 rounded-xl transition duration-150">
            Detail
          </button>
          
          <button @click="selectedProduct = {
            id: {{ $product->id }},
            name: '{{ $product->name }}',
            category: '{{ $product->category }}',
            rawPrice: {{ $product->price }},
            price: 'Rp {{ number_format($product->price, 0, ',', '.') }}',
            stock: {{ $product->stock }},
            image: '{{ asset($product->image) }}',
            desc: '{{ addslashes($product->desc) }}'
          }; quantity = 1; isCheckoutModalOpen = true" 
          {{ $product->stock <= 0 ? 'disabled' : '' }}
          class="w-full {{ $product->stock > 0 ? 'bg-red-600 hover:bg-red-700 text-white' : 'bg-stone-300 text-stone-500 cursor-not-allowed' }} text-xs font-semibold py-2.5 px-3 rounded-xl transition duration-150 shadow-sm">
            {{ $product->stock > 0 ? 'Checkout' : 'Habis' }}
          </button>
        </div>
      </div>
    @endforeach
  </div>

  <!-- MODAL DETAIL PRODUK -->
  <div x-show="isDetailModalOpen" class="fixed inset-0 z-50 overflow-y-auto bg-stone-900/60 backdrop-blur-sm flex items-center justify-center p-4" x-cloak>
    <div @click.outside="isDetailModalOpen = false" class="bg-white rounded-3xl max-w-lg w-full overflow-hidden shadow-2xl transform transition-all">
      <template x-if="selectedProduct">
        <div>
          <div class="relative h-64 bg-stone-100">
            <img :src="selectedProduct.image" :alt="selectedProduct.name" class="w-full h-full object-cover">
            <button @click="isDetailModalOpen = false" class="absolute top-4 right-4 bg-stone-900/70 text-white rounded-full p-2 hover:bg-stone-900">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
          </div>
          <div class="p-6">
            <div class="flex justify-between items-center mb-1">
              <span class="text-xs font-semibold text-yellow-700 uppercase tracking-wider" x-text="selectedProduct.category"></span>
              <span class="text-xs font-bold px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-800" x-text="'Stok Gudang: ' + selectedProduct.stock + ' Pcs'"></span>
            </div>
            <h3 class="text-2xl font-bold text-stone-900 mb-2" x-text="selectedProduct.name"></h3>
            <p class="text-2xl font-extrabold text-red-600 mb-4" x-text="selectedProduct.price"></p>
            <h4 class="text-sm font-bold text-stone-800 mb-1">Deskripsi Produk</h4>
            <p class="text-stone-600 text-sm leading-relaxed mb-6" x-text="selectedProduct.desc"></p>
            
            <div class="flex gap-3">
              <button @click="isDetailModalOpen = false; isCheckoutModalOpen = true" class="flex-1 bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-4 rounded-xl shadow-md transition text-center text-sm">
                Beli & Checkout Sekarang
              </button>
              <button @click="isDetailModalOpen = false" class="bg-stone-100 hover:bg-stone-200 text-stone-700 font-semibold py-3 px-4 rounded-xl transition text-sm">
                Tutup
              </button>
            </div>
          </div>
        </div>
      </template>
    </div>
  </div>

  <!-- MODAL CHECKOUT & PEMBAYARAN -->
  <div x-show="isCheckoutModalOpen" class="fixed inset-0 z-50 overflow-y-auto bg-stone-900/60 backdrop-blur-sm flex items-center justify-center p-4" x-cloak>
    <div @click.outside="isCheckoutModalOpen = false" class="bg-white rounded-3xl max-w-md w-full overflow-hidden shadow-2xl transform transition-all">
      <div class="bg-stone-900 text-white px-6 py-4 flex items-center justify-between">
        <h3 class="font-bold text-lg">Checkout Pesanan Wastra</h3>
        <button @click="isCheckoutModalOpen = false" class="text-stone-400 hover:text-white font-bold text-lg">
          &✕
        </button>
      </div>
      
      <template x-if="selectedProduct">
        <!-- Form wajib menggunakan method POST ke route checkout.store -->
        <form action="{{ route('checkout.store') }}" method="POST">
          @csrf
          
          <!-- Input Tersembunyi untuk mengirim Data ke Backend -->
          <input type="hidden" name="product_id" :value="selectedProduct.id">
          <input type="hidden" name="total_price" :value="selectedProduct.rawPrice * quantity">
          <input type="hidden" name="quantity" :value="quantity">

          <div class="p-6 space-y-4">
            <!-- Ringkasan Produk -->
            <div class="flex items-center gap-4 bg-stone-50 p-3 rounded-2xl border border-stone-200">
              <img :src="selectedProduct.image" class="w-16 h-16 object-cover rounded-xl border border-stone-200">
              <div>
                <h4 class="font-bold text-stone-900 text-sm" x-text="selectedProduct.name"></h4>
                <p class="text-stone-500 text-xs">Satuan: <span class="font-semibold text-stone-700" x-text="selectedProduct.price"></span></p>
              </div>
            </div>

            <!-- Jumlah Pcs -->
            <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Jumlah (Pcs) — Stok Tersedia: <span x-text="selectedProduct.stock"></span></label>
              <div class="flex items-center border border-stone-300 rounded-xl overflow-hidden w-32 bg-white">
                <button type="button" @click="if(quantity > 1) quantity--" class="px-3 py-2 bg-stone-100 hover:bg-stone-200 text-stone-700 font-bold">-</button>
                <input type="text" readonly x-model="quantity" class="w-full text-center text-sm font-semibold text-stone-900 focus:outline-none">
                <button type="button" @click="if(quantity < selectedProduct.stock) quantity++" class="px-3 py-2 bg-stone-100 hover:bg-stone-200 text-stone-700 font-bold">+</button>
              </div>
            </div>

            <!-- Total Pembayaran -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-4 flex items-center justify-between">
              <span class="text-xs font-bold text-stone-700 uppercase tracking-wider">Total Pembayaran:</span>
              <span class="text-lg font-extrabold text-red-600" x-text="formatRupiah(selectedProduct.rawPrice * quantity)"></span>
            </div>

            <!-- Input Data Customer -->
            <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Nomor WhatsApp (Customer)</label>
              <input type="text" name="customer_phone" required placeholder="Contoh: 081234567890" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Nama Lengkap Penerima</label>
              <input type="text" name="customer_name" required placeholder="Masukkan nama Anda" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Alamat Pengiriman Lengkap</label>
              <textarea name="customer_address" rows="2" required placeholder="Masukkan alamat lengkap pengiriman..." class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
            </div>

            <!-- Tombol Submit murni tanpa script WhatsApp -->
            <div class="pt-2">
              <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3.5 px-4 rounded-xl shadow-lg transition text-sm flex items-center justify-center gap-2">
                Lanjut ke Halaman Pembayaran &rarr;
              </button>
            </div>
          </div>
        </form>
      </template>
    </div>
  </div>

  <!-- ================= SECTION ARTIKEL & EDUKASI WASTRA ================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
        <div>
          <span class="text-xs font-bold uppercase tracking-widest text-yellow-800 bg-yellow-100 px-3 py-1 rounded-full">Edukasi & Cerita Wastra</span>
          <h2 class="text-3xl font-black text-stone-900 mt-2">Artikel & Wawasan Budaya Nusantara</h2>
          <p class="text-stone-600 text-sm mt-1">Temukan filosofi, sejarah, dan tips merawat kain tradisional langsung dari para pengrajin.</p>
        </div>
        <a href="#" class="text-xs font-bold text-red-600 hover:text-red-700 flex items-center gap-1 transition">
          Lihat Semua Artikel &rarr;
        </a>
      </div>

      <!-- Grid Artikel Dummy -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Artikel 1 -->
        <div class="bg-white rounded-3xl shadow-sm border border-stone-200 overflow-hidden group hover:shadow-lg transition duration-300 flex flex-col justify-between">
          <div>
            <div class="overflow-hidden h-52">
              <img src="https://images.unsplash.com/photo-1617627143750-d86bc21e42bb?q=80&w=800&auto=format&fit=crop" 
                   class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
            </div>
            <div class="p-6">
              <div class="flex items-center gap-3 text-xs text-stone-500 mb-2">
                <span class="bg-red-50 text-red-700 font-bold px-2.5 py-0.5 rounded-full">Sejarah & Filosofi</span>
                <span>• 12 Oktober 2026</span>
              </div>
              <h3 class="font-bold text-lg text-stone-900 group-hover:text-red-600 transition">Mengenal Filosofi Mendalam Dibalik Motif Batik Klasik</h3>
              <p class="text-stone-600 text-xs mt-2 leading-relaxed line-clamp-2">
                Setiap goresan canting pada batik tulis menyimpan doa dan harapan leluhur yang diwariskan turun-temurun dari generasi ke generasi.
              </p>
            </div>
          </div>
          <div class="px-6 pb-6 pt-0">
            <a href="#" class="text-xs font-bold text-stone-900 hover:text-red-600 flex items-center gap-1 transition">
              Baca Selengkapnya &rarr;
            </a>
          </div>
        </div>

        <!-- Artikel 2 -->
        <div class="bg-white rounded-3xl shadow-sm border border-stone-200 overflow-hidden group hover:shadow-lg transition duration-300 flex flex-col justify-between">
          <div>
            <div class="overflow-hidden h-52">
              <img src="https://images.unsplash.com/photo-1584100936595-c0654b55a2e2?q=80&w=800&auto=format&fit=crop" 
                   class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
            </div>
            <div class="p-6">
              <div class="flex items-center gap-3 text-xs text-stone-500 mb-2">
                <span class="bg-yellow-50 text-yellow-800 font-bold px-2.5 py-0.5 rounded-full">Tips Perawatan</span>
                <span>• 10 Oktober 2026</span>
              </div>
              <h3 class="font-bold text-lg text-stone-900 group-hover:text-red-600 transition">Cara Merawat Kain Tenun & Songket agar Awet Puluhan Tahun</h3>
              <p class="text-stone-600 text-xs mt-2 leading-relaxed line-clamp-2">
                Kain tradisional dengan benang emas memerlukan perhatian khusus dalam hal pencucian dan penyimpanan agar kilaunya tetap terjaga.
              </p>
            </div>
          </div>
          <div class="px-6 pb-6 pt-0">
            <a href="#" class="text-xs font-bold text-stone-900 hover:text-red-600 flex items-center gap-1 transition">
              Baca Selengkapnya &rarr;
            </a>
          </div>
        </div>

        <!-- Artikel 3 -->
        <div class="bg-white rounded-3xl shadow-sm border border-stone-200 overflow-hidden group hover:shadow-lg transition duration-300 flex flex-col justify-between">
          <div>
            <div class="overflow-hidden h-52">
              <img src="https://images.unsplash.com/photo-1528459801416-a9e53bbf4e17?q=80&w=800&auto=format&fit=crop" 
                   class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
            </div>
            <div class="p-6">
              <div class="flex items-center gap-3 text-xs text-stone-500 mb-2">
                <span class="bg-emerald-50 text-emerald-700 font-bold px-2.5 py-0.5 rounded-full">Kisah Pengrajin</span>
                <span>• 05 Oktober 2026</span>
              </div>
              <h3 class="font-bold text-lg text-stone-900 group-hover:text-red-600 transition">Sentra Pengrajin Lokal: Menjaga Nyala Tenun Tradisional</h3>
              <p class="text-stone-600 text-xs mt-2 leading-relaxed line-clamp-2">
                Kisah inspiratif para wanita penenun di daerah pedesaan yang gigih mempertahankan warisan budaya di era modern.
              </p>
            </div>
          </div>
          <div class="px-6 pb-6 pt-0">
            <a href="#" class="text-xs font-bold text-stone-900 hover:text-red-600 flex items-center gap-1 transition">
              Baca Selengkapnya &rarr;
            </a>
          </div>
        </div>

      </div>
    </section>
    
  <!-- Footer Info Section -->
  <div class="bg-yellow-700 pt-12 pb-6 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-yellow-300 rounded-2xl p-8 shadow-xl">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
          <div class="text-center md:text-left">
            <h4 class="text-xs font-bold uppercase tracking-wider text-yellow-800 mb-1">Manage By:</h4>
            <p class="text-base font-bold text-stone-900">Hani Amira Damayanti</p>
          </div>
          <div class="text-center">
            <h4 class="text-xs font-bold uppercase tracking-wider text-yellow-800 mb-2">Support By:</h4>
            <div class="flex justify-center items-center space-x-6">
              <img src="{{ asset('image/unesco.png') }}" alt="UNESCO Logo" class="w-14 h-14 object-contain">
              <img src="{{ asset('image/budaya.png') }}" alt="Budaya Logo" class="w-14 h-14 object-contain">
            </div>
          </div>
          <div class="text-center md:text-right">
            <h4 class="text-xs font-bold uppercase tracking-wider text-yellow-800 mb-2">Contact:</h4>
            <div class="flex justify-center md:justify-end items-center space-x-4">
              <a href="#" aria-label="Instagram" class="bg-white p-2 rounded-full shadow hover:scale-110 transition">
                <img src="{{ asset('image/instagram.png') }}" alt="Instagram" class="w-5 h-5 object-contain">
              </a>
              <a href="#" aria-label="TikTok" class="bg-white p-2 rounded-full shadow hover:scale-110 transition">
                <img src="{{ asset('image/tik-tok.png') }}" alt="TikTok" class="w-5 h-5 object-contain">
              </a>
              <a href="#" aria-label="YouTube" class="bg-white p-2 rounded-full shadow hover:scale-110 transition">
                <img src="{{ asset('image/youtube.png') }}" alt="YouTube" class="w-5 h-5 object-contain">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-layout>