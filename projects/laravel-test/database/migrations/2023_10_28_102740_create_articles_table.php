<?php
// php artisan migrate // /database/migrations
// php artisan make:migration create_articles_table (Dosya Adı)
// php artisan make:migration create_articles_table --create=berkan (Table name)
// php artisan migrate:rollback // Son tabloyu kaldır.
// php artisan migrate:rollback --step=2 // Son iki tabloyu geri al. Son iki komutu değil.
// php artisan migrate:rollback --batch=3 // Batch 3 olanları kaldır.
// php artisan migrate:reset // migrations tablosunu hariç tüm tabloları kaldırır.
// php artisan migrate:refresh // Tüm tabloları kaldırıp tekrar migrate eder.
// php artisan migrate:fresh // Tüm tabloları kaldırır (Migrations tablosu dahil) ve tekrar migrate eder. (Id'ler sıfırlanır.)
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
