<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <!-- Header Section -->
    <div class="text-center max-w-3xl mx-auto mb-16">
      <span class="text-xs font-bold uppercase tracking-widest text-yellow-800 bg-yellow-100 px-3 py-1 rounded-full">Galeri Dokumentasi</span>
      <h1 class="text-4xl font-black text-stone-900 mt-3">Jejak Karya & Kegiatan Pengrajin Wastra</h1>
      <p class="text-stone-600 text-sm mt-3 leading-relaxed">
        Dokumentasi visual proses pembuatan kain tradisional mulai dari seni membatik tulis, bertenun songket, hingga pameran budaya nusantara.
      </p>
    </div>

    <!-- Grid Foto Galeri -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      
      <!-- Item 1: Membatik -->
      <div class="bg-white rounded-3xl shadow-md border border-stone-200 overflow-hidden group hover:shadow-xl transition duration-300">
        <div class="overflow-hidden h-64">
          <img src="https://images.unsplash.com/photo-1617627143750-d86bc21e42bb?q=80&w=800&auto=format&fit=crop" 
               class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        </div>
        <div class="p-6">
          <span class="text-xs font-bold text-red-600 uppercase tracking-wider bg-red-50 px-2.5 py-1 rounded-full">Seni Membatik</span>
          <h3 class="font-bold text-lg text-stone-900 mt-3">Proses Canting Batik Tulis Tradisional</h3>
          <p class="text-stone-600 text-xs mt-1 leading-relaxed">Pengrajin sedang menorehkan malam menggunakan canting di atas kain katun pilihan dengan ketelitian tinggi.</p>
        </div>
      </div>

      <!-- Item 2: Menenun / Tenun Ikat -->
      <div class="bg-white rounded-3xl shadow-md border border-stone-200 overflow-hidden group hover:shadow-xl transition duration-300">
        <div class="overflow-hidden h-64">
          <img src="https://images.unsplash.com/photo-1584100936595-c0654b55a2e2?q=80&w=800&auto=format&fit=crop" 
               class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        </div>
        <div class="p-6">
          <span class="text-xs font-bold text-yellow-800 uppercase tracking-wider bg-yellow-50 px-2.5 py-1 rounded-full">Tenun Nusantara</span>
          <h3 class="font-bold text-lg text-stone-900 mt-3">Tradisi Menenun Kain Songket</h3>
          <p class="text-stone-600 text-xs mt-1 leading-relaxed">Aktivitas penenun wanita merangkai benang emas dan sutra menjadi lembaran kain adat yang megah.</p>
        </div>
      </div>

      <!-- Item 3: Pewarnaan Alami -->
      <div class="bg-white rounded-3xl shadow-md border border-stone-200 overflow-hidden group hover:shadow-xl transition duration-300">
        <div class="overflow-hidden h-64">
          <img src="https://images.unsplash.com/photo-1528459801416-a9e53bbf4e17?q=80&w=800&auto=format&fit=crop" 
               class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        </div>
        <div class="p-6">
          <span class="text-xs font-bold text-emerald-600 uppercase tracking-wider bg-emerald-50 px-2.5 py-1 rounded-full">Edukasi & Budaya</span>
          <h3 class="font-bold text-lg text-stone-900 mt-3">Workshop & Pelatihan Membatik</h3>
          <p class="text-stone-600 text-xs mt-1 leading-relaxed">Sesi edukasi pengenalan motif wastra nusantara kepada generasi muda dan masyarakat umum.</p>
        </div>
      </div>

      <!-- Item 4: Pameran Wastra -->
      <div class="bg-white rounded-3xl shadow-md border border-stone-200 overflow-hidden group hover:shadow-xl transition duration-300">
        <div class="overflow-hidden h-64">
          <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?q=80&w=800&auto=format&fit=crop" 
               class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        </div>
        <div class="p-6">
          <span class="text-xs font-bold text-purple-600 uppercase tracking-wider bg-purple-50 px-2.5 py-1 rounded-full">Pameran Seni</span>
          <h3 class="font-bold text-lg text-stone-900 mt-3">Pameran Kain Tradisional Nasional</h3>
          <p class="text-stone-600 text-xs mt-1 leading-relaxed">Partisipasi Wastra Indonesia dalam menampilkan ragam koleksi kain unggulan dari berbagai provinsi.</p>
        </div>
      </div>

      <!-- Item 5: Pemilihan Benang & Motif -->
      <div class="bg-white rounded-3xl shadow-md border border-stone-200 overflow-hidden group hover:shadow-xl transition duration-300">
        <div class="overflow-hidden h-64">
          <img src="https://images.unsplash.com/photo-1590736969955-71cc9480175f?q=80&w=800&auto=format&fit=crop" 
               class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        </div>
        <div class="p-6">
          <span class="text-xs font-bold text-blue-600 uppercase tracking-wider bg-blue-50 px-2.5 py-1 rounded-full">Kurasi Produk</span>
          <h3 class="font-bold text-lg text-stone-900 mt-3">Kurasi Kualitas Benang & Motif</h3>
          <p class="text-stone-600 text-xs mt-1 leading-relaxed">Pemeriksaan detail dan kualitas serat kain sebelum dipasarkan ke galeri maupun pelanggan setia.</p>
        </div>
      </div>

      <!-- Item 6: Komunitas Pengrajin -->
      <div class="bg-white rounded-3xl shadow-md border border-stone-200 overflow-hidden group hover:shadow-xl transition duration-300">
        <div class="overflow-hidden h-64">
          <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?q=80&w=800&auto=format&fit=crop" 
               class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        </div>
        <div class="p-6">
          <span class="text-xs font-bold text-orange-600 uppercase tracking-wider bg-orange-50 px-2.5 py-1 rounded-full">Pemberdayaan</span>
          <h3 class="font-bold text-lg text-stone-900 mt-3">Kolaborasi Komunitas Pengrajin Lokal</h3>
          <p class="text-stone-600 text-xs mt-1 leading-relaxed">Diskusi dan pembinaan bersama paguyuban pengrajin kain tradisional untuk meningkatkan standar produksi.</p>
        </div>
      </div>

    </div>
  </div>
</x-layout>