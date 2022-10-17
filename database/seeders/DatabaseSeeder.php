<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

            \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@admin.com',
             'password' => bcrypt(123456)
          ]);
        
          \App\Models\Setting::create([
            'title' => 'Blog App',
            'description' => 'My Blog App With Laravel',
            'mail' => 'deneme@deneme.com',
            'keywords' => "null"
         ]);
    }
}
