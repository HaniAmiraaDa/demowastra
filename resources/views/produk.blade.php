<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

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
    
    <div class="text-center max-w-3xl mx-auto mb-12">
      <span class="text-xs font-bold uppercase tracking-widest text-yellow-800 bg-yellow-100 px-3 py-1 rounded-full">Katalog Resmi Gudang</span>
      <h1 class="text-4xl font-black text-stone-900 mt-3 tracking-tight">Koleksi Wastra Nusantara</h1>
      <p class="text-stone-600 mt-3 text-base">Semua stok dan harga kain di bawah terhubung langsung secara real-time dengan sistem inventory gudang.</p>
    </div>

    <!-- Grid Produk dari Database -->
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

    <!-- MODAL CHECKOUT WHATSAPP -->
    <div x-show="isCheckoutModalOpen" class="fixed inset-0 z-50 overflow-y-auto bg-stone-900/60 backdrop-blur-sm flex items-center justify-center p-4" x-cloak>
      <div @click.outside="isCheckoutModalOpen = false" class="bg-white rounded-3xl max-w-md w-full overflow-hidden shadow-2xl transform transition-all">
        <div class="bg-stone-900 text-white px-6 py-4 flex items-center justify-between">
          <h3 class="font-bold text-lg">Checkout Pesanan Wastra</h3>
          <button @click="isCheckoutModalOpen = false" class="text-stone-400 hover:text-white">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
          </button>
        </div>
        
        <template x-if="selectedProduct">
          <div class="p-6 space-y-4">
            <div class="flex items-center gap-4 bg-stone-50 p-3 rounded-2xl border border-stone-200">
              <img :src="selectedProduct.image" class="w-16 h-16 object-cover rounded-xl">
              <div>
                <h4 class="font-bold text-stone-900 text-sm" x-text="selectedProduct.name"></h4>
                <p class="text-stone-500 text-xs">Satuan: <span class="font-semibold text-stone-700" x-text="selectedProduct.price"></span></p>
              </div>
            </div>

            <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Jumlah (Pcs) — Maks: <span x-text="selectedProduct.stock"></span></label>
              <div class="flex items-center border border-stone-300 rounded-xl overflow-hidden w-32">
                <button @click="if(quantity > 1) quantity--" class="px-3 py-2 bg-stone-100 hover:bg-stone-200 text-stone-700 font-bold">-</button>
                <input type="text" readonly x-model="quantity" class="w-full text-center text-sm font-semibold text-stone-900 focus:outline-none">
                <button @click="if(quantity < selectedProduct.stock) quantity++" class="px-3 py-2 bg-stone-100 hover:bg-stone-200 text-stone-700 font-bold">+</button>
              </div>
            </div>

            <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-4 flex items-center justify-between">
              <span class="text-xs font-bold text-stone-700 uppercase tracking-wider">Total Pembayaran:</span>
              <span class="text-lg font-extrabold text-red-600" x-text="formatRupiah(selectedProduct.rawPrice * quantity)"></span>
            </div>

            <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Nomor WhatsApp (Customer)</label>
              <input type="text" x-model="customerPhone" placeholder="Contoh: 081234567890" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Nama Lengkap Penerima</label>
              <input type="text" x-model="customerName" placeholder="Masukkan nama Anda" class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div>
              <label class="block text-xs font-semibold text-stone-700 mb-1">Alamat Pengiriman Lengkap</label>
              <textarea rows="2" x-model="customerAddress" placeholder="Masukkan alamat lengkap pengiriman..." class="w-full px-4 py-2.5 rounded-xl border border-stone-300 text-sm focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
            </div>

            <div class="pt-2">
              <button @click="
                if (!customerPhone || !customerName || !customerAddress) {
                  alert('Mohon lengkapi semua data form (No WA, Nama, dan Alamat)!');
                  return;
                }
                
                let adminPhone = '6281234567890'; // Ganti dengan nomor WhatsApp Admin/Gudang Anda
                let totalHarga = formatRupiah(selectedProduct.rawPrice * quantity);
                
                let message = `Halo Admin Gudang Wastra Indonesia, saya ingin memesan produk berikut:%0A%0A` +
                              `*--- RIWAYAT PEMBELIAN ---*%0A` +
                              `- Produk: ${selectedProduct.name}%0A` +
                              `- Jumlah: ${quantity} Pcs%0A` +
                              `- *Total Pembayaran: ${totalHarga}*%0A%0A` +
                              `*--- DATA CUSTOMER ---*%0A` +
                              `- Nama: ${customerName}%0A` +
                              `- No. WhatsApp: ${customerPhone}%0A` +
                              `- Alamat: ${customerAddress}%0A%0A` +
                              `Mohon diproses pengecekan stok gudang dan pengirimannya. Terima kasih!`;
                
                window.open(`https://wa.me/${adminPhone}?text=${message}`, '_blank');
                isCheckoutModalOpen = false;
              " class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-4 rounded-xl shadow-lg transition text-sm flex items-center justify-center gap-2">
                Konfirmasi & Kirim Pesanan via WhatsApp
              </button>
            </div>
          </div>
        </template>
      </div>
    </div>

  </div>
</x-layout>