<?php
// php artisan make:controller Web/HomeController --resource
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    public function index(Request $request)
    {
        $current_language = session()->get('current_language')->id;
        $perPage = 6;
        $page = $request->input('page', 1);
        if ($request->filled('search')) {
            $search = $request->input('search');
            $params = [
                'index'   => 'articles',
                '_source' => ['id', 'title', 'slug', 'body'],
                'body'    => [
                    'query' => [
                        'bool' => [
                            'must'   => [
                                [
                                    'multi_match' => [
                                        'query'  => $search,
                                        'fields' => ['title', 'slug', 'body']
                                    ]
                                ],
                                ['term' => ['language_id' => $current_language]],
                                ['term' => ['is_active' => 1]]
                            ],
                            'filter' => [
                                ['exists' => ['field' => 'category_id']]
                            ]
                        ]
                    ],
                    'sort'  => [
                        ['created_at' => ['order' => 'desc']],
                        '_score'
                    ],
                    'from'  => ($page - 1) * $perPage,
                    'size'  => $perPage
                ]
            ];
            $results = app('elasticsearch')->search($params);
            $records = elasticsearch_to_paginator($results, Article::class, $perPage, $page);
            $title = "Search Article: \"{$search}\"";
        } else {
            if (app('elasticsearch')->indices()->exists(['index' => 'articles'])) {
                $params = [
                    'index'   => 'articles',
                    '_source' => ['id', 'title', 'slug', 'body'],
                    'body'    => [
                        'query' => [
                            'bool' => [
                                'must'   => [
                                    ['term' => ['language_id' => $current_language]],
                                    ['term' => ['is_active' => 1]]
                                ],
                                'filter' => [
                                    ['exists' => ['field' => 'category_id']]
                                ]
                            ]
                        ],
                        'sort'  => [
                            ['created_at' => ['order' => 'desc']],
                            '_score'
                        ],
                        'from'  => ($page - 1) * $perPage,
                        'size'  => $perPage
                    ]
                ];
                $results = app('elasticsearch')->search($params);
                $records = elasticsearch_to_paginator($results, Article::class, $perPage, $page);
            } else {
                $records = Article::query()->where('language_id', $current_language)->whereNotNull('category_id')
                    ->select(['id', 'title', 'slug', 'body'])
                    ->orderBy('created_at', 'desc')->paginate($perPage);
            }
            $title = 'Article List';
        }
        return view('web.article.index', compact(['title', 'records']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dump("article create");
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
    public function show(Request $request)
    {
        $slug = LaravelLocalization::transRoute('routes.'.str_replace('article.page.', '',
                $request->route()->getName()));
        $record = Article::query()->where('slug', $slug)->where('is_active', 1)
            ->select(['id', 'title', 'slug', 'body'])->first();
        if (empty($record)) {
            abort(404);
        }
        $title = $record->title;
        return view('web.article.detail', compact(['title', 'record']));
    }

    /**
     * Display the specified resource.
     */
    public function show_article_page(Article $article)
    {
        $record = $article;
        $title = $record->title;
        return view('web.article.detail', compact(['title', 'record']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //dump("article edit - ".$id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dump("article updated - ".$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //dump("article deleted - ".$id);
    }
}
