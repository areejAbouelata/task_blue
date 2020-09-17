<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'name' => 'admin' ,
            'email' => 'admin@admin.com' ,
            'password' => '$2y$10$usZ0LOSxllkkxmiE3/74kOg5hyZAAJCY8c3weWaMWzQjse0.0KjR2'
        ]);
    }
}
