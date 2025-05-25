<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => 'First Post',
                'slug' => Str::slug('First Post'),
                'excerpt' => 'This is the excerpt of the first post.',
                'content' => 'This is the full content of the first post.',
                'image' => 'sample-images/sample1.jpg', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Second Post',
                'slug' => Str::slug('Second Post'),
                'excerpt' => 'Excerpt for the second post.',
                'content' => 'Full content for the second post.',
                'image' => 'sample-images/sample2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

         $this->call([
            PostSeeder::class,
        ]);
    }

  

}
