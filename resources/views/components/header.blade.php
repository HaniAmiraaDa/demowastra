<header class="relative z-0 bg-stone-700 after:pointer-events-none after:absolute after:inset-x-0 after:inset-y-0 after:border-y after:border-white/10">
  {{-- Gambar akan mengisi seluruh header dan berada di belakang konten --}}
  <img src="{{ asset('image/header2.jpg') }}" alt="Header Background"
       class="absolute inset-0 w-full h-full object-cover z-[-1]"> {{-- z-[-1] untuk menempatkan di belakang --}}

  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 relative z-10"> {{-- z-10 agar konten di atas gambar --}}
    <h1 class="text-3xl font-bold tracking-tight text-stone-300 ">{{ $slot }}</h1>
  </div>
</header>