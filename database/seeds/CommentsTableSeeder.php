<?php

use Illuminate\Database\Seeder;
use App\Comment;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 500 ; $i++) {
            $comment = "comment_$i";
            $comment = new Comment();
            $comment->id = $i;
            $comment->name = str_random(10);
            $comment->email = str_random(10).'@gmail.com';
            $comment->comment = str_random(100);
            $comment->approved =  rand(0, 1);
            $comment->post_id = rand(1, 50);
            $comment->created_at = Carbon::now();
            $comment->updated_at = Carbon::now();
            $comment->save();
        }
    }
}
