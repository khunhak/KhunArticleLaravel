<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Blog;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Blog::truncate();
        Category::truncate();
        User::truncate();
        $mgmg = User::factory()->create(['username'=>'mgmg','name'=>'mgmg']);
        $aungaung = User::factory()->create(['username'=>'aungaung','name'=>'aungaung']);
        $frontend = Category::factory()->create(['name'=>'frontend','slug'=>'frontend']);
        $backend = Category::factory()->create(['name'=>'backend','slug'=>'backend']);
        Blog::factory(2)->create(['category_id'=>$frontend->id,'user_id'=>$mgmg->id]);
        Blog::factory(2)->create(['category_id'=>$backend->id,'user_id'=>$aungaung->id]);
    }
}
