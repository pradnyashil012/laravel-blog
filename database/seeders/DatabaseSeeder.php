<?php
namespace Database\Seeders;
use App\Models\Category;
use App\Models\Post;
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
        
        $this->call(UserTableSeeder::class);
        $this->call(SettingTableSeeder::class);

        Category::factory(5)->create();
        Post::factory(50)->create();
    }
}
