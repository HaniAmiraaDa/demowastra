<x-layout>
  <x-slot:title>{{$title}}</x-slot:title>

@foreach ($posts as $post) 
  <article class="py-8">
  <div class="max-w-screen-md border-b border-gray-200 pb-6">
    <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
    <h2 class="mb-1 text-2xl tracking-tight font-bold text-slate-900">{{ $post ['title'] }}</h2></a>
    <div class="text-base text-slate-500">
        <a href="#">{{ $post ['Author'] }}</a> | 4 Juni 2025
    </div>
    <p class="my-4 font-light">{{Str::limit ($post ['body'], 50 ) }}</p>
    <a href="/posts/{{ $post['slug'] }}" class="font-medium text-red-500 hover:underline">Read More &raquo;</a>
  </div>
</article>
@endforeach

  
</x-layout>