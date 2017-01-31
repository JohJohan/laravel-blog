<?php

use Illuminate\Database\Seeder;
use App\Category;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 5 ; $i++) {
            $Category = "category_$i";
            $Category = new Category();
            $Category->id = $i;
            $Category->name = str_random(10);
            $Category->created_at = Carbon::now();
            $Category->updated_at = Carbon::now();
            $Category->save();
        }
    }
}
