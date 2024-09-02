<?php
// php artisan db:seed
// php artisan db:seed --class=ArticleSeeder
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(1000)->create();
        //\App\Models\Order::factory(1000)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*$this->call([
            CategorySeeder::class,
            ArticleSeeder::class
        ]);*/
    }
}
