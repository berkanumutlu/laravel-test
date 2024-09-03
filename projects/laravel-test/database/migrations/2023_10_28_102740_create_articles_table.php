<?php
/*
 * php artisan migrate ===> /database/migrations içerisinde tanımlanan migrationları uygular.
 *
 * php artisan make:migration create_articles_table ===> create_dosyaAdı_table
 *
 * php artisan make:migration create_articles_table --create=berkan ===> --create=Table Name
 *
 * php artisan migrate:rollback ===> Son işlemi geri al.
 *
 * php artisan migrate:rollback --step=2 ===> Son iki işlemi geri al.
 *
 * php artisan migrate:rollback --batch=3 ===> Batch 3 olanları kaldır.
 *
 * php artisan migrate:reset ===> migrations tablosunu hariç tüm tabloları kaldırır.
 *
 * php artisan migrate:refresh ===> Tüm tabloları kaldırıp tekrar migrate eder.
 *
 * php artisan migrate:fresh ===> Tüm tabloları kaldırır (Migrations tablosu dahil) ve tekrar migrate eder. (Id'ler sıfırlanır.)
 *
 * php artisan migrate:refresh --path=database/migrations/2023_10_28_102740_create_articles_table.php ===> Sadece belirtilen dosyayı migrate eder.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id('Id');
            $table->integer('language_group_id')->nullable();
            $table->unsignedBigInteger('language_id');
            $table->string('title', 80);
            $table->string('slug');
            $table->text('body');
            $table->integer('sort')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps(); // created_at, updated_at
            /*
             * env içerisinde db karakteri türü set edilerek aşağıdaki kod tekrarına gerek kalmaz.
             */
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
