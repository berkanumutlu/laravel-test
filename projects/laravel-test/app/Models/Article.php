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
    //protected $fillable = ['title', 'body', 'category_id', 'is_active', 'slug'];
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
    protected $hidden = ['created_at'];
    /*
     * Alanlar için tür dönüşümü yaptırmayı sağlıyor.
     */
    //protected $casts = ['created_at' => 'datetime'];

    public function toArray(): array
    {
        return [
            'id'                => $this->id,
            'language_group_id' => $this->language_group_id,
            'language_id'       => $this->language_id,
            'category_id'       => $this->category_id,
            'title'             => $this->title,
            'slug'              => $this->slug,
            'body'              => $this->body,
            'is_featured'       => $this->is_featured,
            'sort'              => $this->sort,
            'is_active'         => $this->is_active,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at
        ];
    }

    public function toSearchableArray(): array
    {
        return [
            'id'    => $this->id,
            'title' => $this->title,
            'slug'  => $this->slug,
            'body'  => $this->body
        ];
    }

    public static function boot()
    {
        parent::boot();
        static::created(function ($article) {
            $article->addToIndex();
        });
        static::updated(function ($article) {
            $article->updateIndex();
        });
        static::deleted(function ($article) {
            $article->deleteFromIndex();
        });
    }

    // Elasticsearch'e ekleme
    public function addToIndex()
    {
        app('elasticsearch')->index([
            'index' => 'articles',
            'id'    => $this->id,
            'body'  => $this->toArray()
        ]);
    }

    // Elasticsearch'te güncelleme
    public function updateIndex()
    {
        app('elasticsearch')->update([
            'index' => 'articles',
            'id'    => $this->id,
            'body'  => [
                'doc' => $this->toArray()
            ]
        ]);
    }

    // Elasticsearch'ten silme
    public function deleteFromIndex()
    {
        app('elasticsearch')->delete([
            'index' => 'articles',
            'id'    => $this->id
        ]);
    }
}
