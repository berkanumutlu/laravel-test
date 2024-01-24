<?php
// php artisan make:controller Web/HomeController --resource
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /*public function __construct()
    {
        $categories = Category::query()->where('status', 1)
            ->orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        View::share(compact('categories'));
    }*/

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Article::query()->select([
            'id', 'title', 'slug_name', 'body'
        ])->orderBy('created_at')->paginate(6);
        $title = 'Article List';
        return view('web.article.index', compact(['title', 'records']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dump("article create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dump("article show - ".$id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        dump("article edit - ".$id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dump("article updated - ".$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dump("article deleted - ".$id);
    }
}
