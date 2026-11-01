<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <!-- Header Section -->
    <div class="text-center max-w-3xl mx-auto mb-16">
      <span class="text-xs font-bold uppercase tracking-widest text-yellow-800 bg-yellow-100 px-3 py-1 rounded-full">Layanan & Bantuan</span>
      <h1 class="text-4xl font-black text-stone-900 mt-3">Hubungi Tim Wastra Indonesia</h1>
      <p class="text-stone-600 text-sm mt-3 leading-relaxed">
        Punya pertanyaan seputar ketersediaan kain tradisional, pemesanan khusus, atau kerja sama? Silakan hubungi kami melalui saluran resmi di bawah ini.
      </p>
    </div>

    <!-- Informasi Kontak Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
      
      <!-- Alamat Kantor -->
      <div class="bg-white p-8 rounded-3xl shadow-sm border border-stone-200 text-center space-y-4">
        <div class="w-12 h-12 bg-red-100 text-red-600 rounded-2xl flex items-center justify-center mx-auto text-xl font-bold">
          📍
        </div>
        <h3 class="font-bold text-lg text-stone-900">Kantor & Galeri Utama</h3>
        <p class="text-stone-600 text-xs leading-relaxed">
          Jl. Batik Nusantara Raya No. 45<br>Kota Semarang, Jawa Tengah 50134
        </p>
      </div>

      <!-- Email & Telepon -->
      <div class="bg-white p-8 rounded-3xl shadow-sm border border-stone-200 text-center space-y-4">
        <div class="w-12 h-12 bg-yellow-100 text-yellow-800 rounded-2xl flex items-center justify-center mx-auto text-xl font-bold">
          ✉️
        </div>
        <h3 class="font-bold text-lg text-stone-900">Email & Telepon</h3>
        <p class="text-stone-600 text-xs leading-relaxed">
          Email: info@wastraindonesia.com<br>Telp: (024) 8901234
        </p>
      </div>

      <!-- Jam Operasional -->
      <div class="bg-white p-8 rounded-3xl shadow-sm border border-stone-200 text-center space-y-4">
        <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mx-auto text-xl font-bold">
          ⏰
        </div>
        <h3 class="font-bold text-lg text-stone-900">Jam Operasional</h3>
        <p class="text-stone-600 text-xs leading-relaxed">
          Senin - Jumat: 08.00 - 17.00 WIB<br>Sabtu: 08.00 - 14.00 WIB
        </p>
      </div>

    </div>

    <!-- Banner Customer Service WhatsApp -->
    <div class="bg-gradient-to-r from-emerald-600 to-emerald-800 rounded-3xl p-8 md:p-12 text-white shadow-xl flex flex-col md:flex-row items-center justify-between gap-8">
      <div class="space-y-3 text-center md:text-left">
        <span class="text-xs font-bold uppercase tracking-widest bg-white/20 px-3 py-1 rounded-full">Layanan Cepat 24/7</span>
        <h2 class="text-3xl font-black">Butuh Bantuan & Konsultasi Langsung?</h2>
        <p class="text-emerald-100 text-sm max-w-xl leading-relaxed">
          Klik tombol di samping untuk terhubung langsung dengan Customer Service kami via WhatsApp guna menanyakan detail produk, status pesanan, maupun konsultasi kain nusantara.
        </p>
      </div>
      
      <!-- Tombol Link WhatsApp CS -->
      <a href="https://wa.me/6281234567890?text=Halo%20Customer%20Service%20Wastra%20Indonesia,%20saya%20ingin%20bertanya%20seputar%20produk%20kain." 
         target="_blank" 
         class="bg-white hover:bg-stone-100 text-emerald-800 font-extrabold px-8 py-4 rounded-2xl shadow-lg transition flex items-center gap-3 text-sm whitespace-nowrap">
        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
        Chat Customer Service WhatsApp
      </a>
    </div>

  </div>
</x-layout>