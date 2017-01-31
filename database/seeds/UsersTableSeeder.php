<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create user
        $admin_1 = new User();
        $admin_1->name = "admin";
        $admin_1->id = 1;
        $admin_1->email = "admin@admin.nl";
        $admin_1->password = bcrypt('admin');
        $admin_1->created_at = Carbon::now();
        $admin_1->updated_at = Carbon::now();
        $admin_1->save();
    }
}
