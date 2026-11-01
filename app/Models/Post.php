<?php

namespace App\Models;
use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return [
        [
          'id' => 1,
          'slug' => 'judul-berita-1',
          'title' => 'Judul Berita 1',
          'Author' => 'Hani Amira Damayanti',
          'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed omnis vitae atque porro! Consequatur,
        repellendus enim soluta, quis ducimus eos voluptatum omnis nostrum assumenda inventore, 
        possimus ipsum ullam! Sapiente, ut.'
        ],
        [
          'id' => 2,
          'slug' => 'judul-berita-2',
          'title' => 'Judul Berita 2',
          'Author' => 'Hani Amira Damayanti',
          'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis saepe dignissimos voluptatibus reiciendis ex animi ea distinctio voluptates alias ut nisi recusandae, quos perspiciatis nam autem ab nesciunt quibusdam tempora.'
        ]
        ];
    
}

public static function find ($slug)
{
    return  Arr::first(static::all(), function($post) use ($slug) {
    return $post ['slug'] == $slug;
   });

}
}

