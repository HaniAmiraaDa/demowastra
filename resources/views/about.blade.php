<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <!-- Header Section -->
    <div class="text-center max-w-3xl mx-auto mb-16">
      <span class="text-xs font-bold uppercase tracking-widest text-yellow-800 bg-yellow-100 px-3 py-1 rounded-full">Tentang Kami</span>
      <h1 class="text-4xl font-black text-stone-900 mt-3">Mengenal Lebih Dekat PT Kain Nusantara</h1>
      <p class="text-stone-600 text-sm mt-3 leading-relaxed">
        Wastra Indonesia hadir sebagai wadah pelestarian, galeri, sekaligus pusat distribusi kain tradisional nusantara berkualitas tinggi langsung dari para pengrajin lokal.
      </p>
    </div>

    <!-- Grid Profil Perusahaan -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
      <div class="space-y-6">
        <h3 class="text-2xl font-black text-stone-900">Melestarikan Warisan Leluhur Melalui Karya Kain Nusantara</h3>
        <p class="text-stone-600 text-sm leading-relaxed">
          Sejak didirikan, <strong>PT Kain Nusantara (Wastra Indonesia)</strong> berkomitmen penuh untuk mengangkat harkat dan martabat budaya lokal Indonesia. Kami menjalin kemitraan langsung dengan sentra-sentra pengerajin batik, tenun, songket, dan ulos di berbagai daerah untuk memastikan keaslian, filosofi corak, serta kualitas terbaik tetap terjaga.
        </p>
        <p class="text-stone-600 text-sm leading-relaxed">
          Tidak hanya berfokus pada penjualan, kami aktif memberikan pendampingan digitalisasi bagi para pengrajin lokal agar karya seni tekstil Indonesia mampu menembus pasar nasional hingga mancanegara.
        </p>
        <div class="grid grid-cols-2 gap-4 pt-2">
          <div class="bg-stone-50 p-4 rounded-2xl border border-stone-200">
            <span class="block text-2xl font-black text-red-600">100%</span>
            <span class="text-xs text-stone-500 font-semibold">Kain Tradisional Asli</span>
          </div>
          <div class="bg-stone-50 p-4 rounded-2xl border border-stone-200">
            <span class="block text-2xl font-black text-yellow-800">50+</span>
            <span class="text-xs text-stone-500 font-semibold">Sentra Pengrajin Mitra</span>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-4">
        <img src="https://images.unsplash.com/photo-1617627143750-d86bc21e42bb?q=80&w=600&auto=format&fit=crop" class="rounded-3xl shadow-md object-cover h-64 w-full">
        <img src="https://images.unsplash.com/photo-1584100936595-c0654b55a2e2?q=80&w=600&auto=format&fit=crop" class="rounded-3xl shadow-md object-cover h-64 w-full mt-8">
      </div>
    </div>

    <!-- Visi & Misi -->
    <div class="bg-stone-900 text-white rounded-3xl p-8 md:p-12 shadow-xl grid grid-cols-1 md:grid-cols-2 gap-8">
      <div>
        <span class="text-xs font-bold uppercase tracking-widest text-yellow-400 bg-yellow-400/10 px-3 py-1 rounded-full">Visi Kami</span>
        <h4 class="text-xl font-bold mt-3 mb-2">Pusat Wastra Terdepan</h4>
        <p class="text-stone-300 text-sm leading-relaxed">
          Menjadi pelopor utama dalam menjaga kelestarian, inovasi, dan pemasaran wastra nusantara agar menjadi kebanggaan serta identitas busana modern bangsa Indonesia.
        </p>
      </div>
      <div>
        <span class="text-xs font-bold uppercase tracking-widest text-yellow-400 bg-yellow-400/10 px-3 py-1 rounded-full">Misi Kami</span>
        <h4 class="text-xl font-bold mt-3 mb-2">Memberdayakan Pengrajin</h4>
        <p class="text-stone-300 text-sm leading-relaxed">
          Memberikan kesejahteraan bagi pengrajin lokal melalui sistem perdagangan yang adil, serta menyediakan platform digital terintegrasi untuk memudahkan pecinta seni mendapatkan kain asli berkualitas.
        </p>
      </div>
    </div>

  </div>
</x-layout>