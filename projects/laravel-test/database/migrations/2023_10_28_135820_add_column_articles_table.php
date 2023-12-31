<?php
// php artisan make:migration add_column_articles_table --table=articles
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
            /*
             * Tabloya FK (Foreign Key) ekleme işlemi
             */
            $table->unsignedBigInteger('category_id')->nullable()->after('body');
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
            /*
             * FK kaldırmak için kullanılıyor.
             */
            //$table->dropForeign('articles_category_id_foreign');
            /*
             * Tablodaki bir alan adını değiştirme işlemi
             * php artisan make:migration rename_status_to_is_active_articles_table --table=articles
             * MYSQL 8.0'dan sonra alttaki method çalışıyor. Önceki sürümler için alttaki sorgu kodu kullanılabilir.
             */
            //$table->renameColumn('status', 'is_active');
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
