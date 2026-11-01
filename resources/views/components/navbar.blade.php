  <nav class="bg-yellow-300/50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img src="{{ asset('image/logo2.png') }}" alt="PT Kain Nusantara" class="w-20 h-20" />
          </div>

          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <a href="/" aria-current="page" class="{{ request()->is('/') ? 'bg-gray-950/50  text-white' : 'text-slate-700 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-bold">Home</a>
              <a href="/about" class="{{ request()->is('about') ? 'bg-gray-950/50  text-white' : 'text-slate-700 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Tentang Kami</a>
              <a href="/produk" class="{{ request()->is('produk') ? 'bg-gray-950/50  text-white' : 'text-slate-700 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Koleksi Wastra</a>
              <a href="/galeri" class="{{ request()->is('galeri') ? 'bg-gray-950/50  text-white' : 'text-slate-700 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Galeri</a>
              <a href="/kontak" class="{{ request()->is('kontak') ? 'bg-gray-950/50  text-white' : 'text-slate-700 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Kontak</a>
             
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <button type="button" class="relative rounded-full p-1 text-slate-700 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
              <span class="sr-only">View notifications</span>
              <svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>

          </div>
        </div>
        <!-- Mobile button -->
        <div class="-mr-2 flex md:hidden">
          <button @click="mobileOpen=!mobileOpen" type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-slate-700 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
            <span class="sr-only">Open main menu</span>
            <svg x-show="!mobileOpen" class="size-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <svg x-show="mobileOpen" class="size-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="mobileOpen" x-transition class="md:hidden">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <a href="/" class="block rounded-md bg-stone-700/50 px-3 py-2 text-base font-medium text-white">Home</a>
        <a href="/about" class="block rounded-md px-3 py-2 text-base font-medium text-slate-700 hover:bg-white/5 hover:text-white">Tentang Kami</a>
        <a href="/produk" class="block rounded-md px-3 py-2 text-base font-medium text-slate-700 hover:bg-white/5 hover:text-white">Produk</a>
        <a href="/galeri" class="block rounded-md px-3 py-2 text-base font-medium text-slate-700 hover:bg-white/5 hover:text-white">Galeri</a>
        <a href="/kontak" class="block rounded-md px-3 py-2 text-base font-medium text-slate-700 hover:bg-white/5 hover:text-white">Kontak</a>
      </div>
    </div>
  </nav>