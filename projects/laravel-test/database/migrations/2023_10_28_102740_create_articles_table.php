<?php
// php artisan migrate // /database/migrations
// php artisan make:migration create_articles_table (Dosya Adı)
// php artisan make:migration create_articles_table --create=berkan (Table name)
// php artisan migrate:rollback // Son işlemi geri al.
// php artisan migrate:rollback --step=2 // Son iki işlemi geri al.
// php artisan migrate:rollback --batch=3 // Batch 3 olanları kaldır.
// php artisan migrate:reset // migrations tablosunu hariç tüm tabloları kaldırır.
// php artisan migrate:refresh // Tüm tabloları kaldırıp tekrar migrate eder.
// php artisan migrate:fresh // Tüm tabloları kaldırır (Migrations tablosu dahil) ve tekrar migrate eder. (Id'ler sıfırlanır.)
//php artisan make:migration add_column_articles_table --table=articles
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
            $table->id('Id');
            $table->string('title', 80);
            $table->text('body');
            $table->tinyInteger('status')->default(0);
            $table->string('slug_name');
            $table->timestamps(); // created_at, updated_at

            //$table->charset = "utf8";
            //$table->collation = "utf8_general_ci";
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