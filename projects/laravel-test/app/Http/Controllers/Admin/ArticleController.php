<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Category;
use App\Traits\Loggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticleController extends BaseController
{
    use Loggable;

    /**
     * Create the controller instance.
     */
    public function __construct()
    {
        parent::__construct();
        /*
         * Authorizing Resource Controllers
         * Controller Method	Policy Method
         * index	                viewAny
         * show                     view
         * create	                create
         * store	                create
         * edit	                    update
         * update	                update
         * destroy	                delete
         */
        // $this->authorizeResource(Article::class, 'article');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'body'  => 'required|min:3'
        ]);
        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }
        $article = Article::create($request->all());
        return redirect('admin.article.create')->with('success', 'Article Created Successfully!');
        // OR
        return redirect('admin.article.create')->withSuccess('Article Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id = null)
    {
        $record = Article::query()->select(['title', 'body', 'category_id', 'is_active', 'slug'])
            ->where('id', $id)->first();
        if (is_null($record)) {
            alert()->error("Error", "Article not found.")->showConfirmButton("OK");
            return redirect()->route('admin.article.index');
        }
        $this->data['record'] = $record;
        $this->data['category_list'] = Category::where('status', 1)->select(['id', 'name'])
            ->orderBy('name', 'asc')->get();
        $this->data['title'] = 'Article Edit #'.$id;
        return view("admin.article.edit", $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleUpdateRequest $request, string $id)
    {
        $article = Article::query()->where("id", $id)->first();
        /*
         * Authorization
         */
        /*if (Gate::denies('admin-update-article', $article)) {
            abort(403);
        }
        if (!Gate::allows('update-article', $article)) {
            abort(403);
        }
        if ($request->user()->cannot('update', $article)) {
            abort(403);
        }
        if ($request->user()->cannot('create', Article::class)) {
            abort(403);
        }
        */
        $this->authorize('admin_update', $article);

        // Authorizing Actions
        /*if (Gate::forUser($user)->allows('update-article', $article)) {
            // The user can update the article...
        }
        if (Gate::forUser($user)->denies('update-article', $article)) {
            // The user can't update the article...
        }
        if (Gate::any(['update-article', 'delete-article'], $article)) {
            // The user can update or delete the article...
        }
        if (Gate::none(['update-article', 'delete-article'], $article)) {
            // The user can't update or delete the article...
        }*/

        // Gate Responses
        /*$response = Gate::inspect('edit-settings');
        if ($response->allowed()) {
            // The action is authorized...
        } else {
            echo $response->message();
        }*/

        // Authorizing or Throwing Exceptions
        // Gate::authorize('update-article', $article);

        $article->slug = !empty($request->slug) ? Str::slug($request->slug) : Str::slug($request->title);
        $article->title = trim($request->title);
        $article->body = $request->body;
        $article->category_id = $request->category_id ?? null;
        $article->is_active = isset($request->is_active) ? 1 : 0;
        /*$slug = !empty($request->slug) ? Str::slug($request->slug) : Str::slug($request->title);
        $data = [
            'title'       => trim($request->title),
            'slug'   => $slug,
            'body'        => $request->body,
            'category_id' => $request->category_id ?? null,
            'is_active'   => isset($request->is_active) ? 1 : 0
        ];*/
        try {
            //Article::query()->where('id', $id)->update($data);
            $this->updateLog($article);
            $article->save();
        } catch (\Exception $e) {
            alert()->error("Error", "Record could not be updated.")->showConfirmButton("OK");
            return redirect()->back()->exceptInput("_token", "files", "image");
        }
        alert()->success("Success", "Record has been updated successfully.")->showConfirmButton("OK")->autoClose(5000);
        return redirect()->back()->exceptInput("_token", "files", "image");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //dump("admin article deleted #".$id);
    }
}
