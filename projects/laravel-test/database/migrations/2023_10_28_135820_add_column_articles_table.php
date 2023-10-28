<?php

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
        Schema::table('articles', function (Blueprint $table) {
            // Tabloya FK ekleme işlemi
            $table->unsignedBigInteger('category_id')->after('body');
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
            // FK kaldırmak için kullanılıyor.
            //$table->dropForeign('articles_category_id_foreign');
            // Tablodaki bir field adını değiştirme işlemi
            // php artisan make:migration rename_status_to_is_active_articles_table --table=articles
            //$table->renameColumn('status', 'is_active'); // MYSQL 8.0'dan sonra çalışıyor. Önceki sürümler için alttaki kod kullanılabilir.
            //\Illuminate\Support\Facades\DB::statement("ALTER TABLE articles CHANGE COLUMN status is_active tinyint not null");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }
};
