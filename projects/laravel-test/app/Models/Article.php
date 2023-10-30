<?php
// php artisan make:model Article
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /*
     * Fake Dataları kullanmamızı sağlıyor.
     */
    use HasFactory;

    /*
     * Class adı yerine istediğimiz tablo adını girerek işlem yapmamızı sağlar.
     */
    //protected $table = "article";
    /*
     * Doldurulabilecek, kullanılacak alanları seçmemizi sağlıyor. Fillable veya Guarded tanımı yoksa hiçbir alanla işlem yapılamaz.
     */
    //protected $fillable = ['title', 'body', 'category_id', 'is_active', 'slug_name'];
    /*
     * Kullanılmayacak, hariç tutulacak alanları seçmemizi sağlıyor. Boş bırakılırsa tüm alanlar kullanılır. 'id' yazınca id hariç hepsini kullan anlamına geliyor.
     */
    protected $guarded = [];
    /*
     * created_at ve updated_at alanlarında işlem yapmacak
     */
    //public $timestamps = false;
    /*
     * Ön tarafta hangi alanların kullanılacağını belirtir.
     */
    protected $visible = ['title', 'body'];
    /*
     * Ön tarafta hangi alanların gizleneceğini belirtir.
     */
    protected $hidden = ['id', 'created_at'];
    /*
     * Alanlar için tür dönüşümü yaptırmayı sağlıyor.
     */
    //protected $casts = ['created_at' => 'datetime'];
}
