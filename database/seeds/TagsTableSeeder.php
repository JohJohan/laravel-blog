<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Carbon\Carbon;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create tags
        for ($i=1; $i <= 5 ; $i++) {
            $tag = "tag_$i";
            $tag = new Tag();
            $tag->id = $i;
            $tag->name = str_random(10);
            $tag->created_at = Carbon::now();
            $tag->updated_at = Carbon::now();
            $tag->save();
        }

        // for ($i=0; $i < 50 ; $i++) {
        //     $post_tag = "post_tag_$i";
        //     $post_tag = new Post();
        //     $post_tag->post_id = rand(1, 50);
        //     $post_tag->tag_id = rand(1, 5);
        //     $post_tag->save();
        // }
    }
}
