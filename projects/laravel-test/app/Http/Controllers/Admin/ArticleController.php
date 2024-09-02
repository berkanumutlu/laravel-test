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
        }*/
        $this->authorize('admin_update', $article);

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
        dump("admin article deleted #".$id);
    }
}
