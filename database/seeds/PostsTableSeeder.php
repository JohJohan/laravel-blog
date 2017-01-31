<?php

use Illuminate\Database\Seeder;
use App\Post;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 50 ; $i++) {
            $post = "post_$i";
            $post_name = str_random(10) . '_' . $i;
            $post = new Post();
            $post->id = $i;
            $post->title = $post_name;
            $post->body = str_random(100);
            $post->slug = $post_name;
            $post->category_id = rand(1, 10 );
            $post->created_at = Carbon::now();
            $post->updated_at = Carbon::now();
            $post->save();
        }
    }
}
