<x-layout>
  <x-slot:title>{{$title}}</x-slot:title>

  <article class="py-8">
  <div class="max-w-screen-md">
    <h2 class="mb-1 text-2xl tracking-tight font-bold text-slate-900">{{ $post ['title'] }}</h2>
    <div class="text-base text-slate-500">
        <a href="#">{{ $post ['Author'] }}</a> | 4 Juni 2025
    </div>
    <p class="my-4 font-light">{{ $post ['body'] }}</p>
    <a href="/posts" class="font-medium text-red-500 hover:underline">&laquo; Back</a>
  </div>
</article>

  
</x-layout>