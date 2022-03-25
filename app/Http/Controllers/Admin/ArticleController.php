<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('updated_at', 'DESC')->paginate(10);
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $tags = explode(',', $request->tags);
        if($request->has('image')){
            $dest = 'public/articles';
            $file_name = time()."_".$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs($dest, $file_name);
        }
        $user_id = auth()->user()->id;
        $article = Article::create([
            'title' => $request->title,
            'image' => $file_name ?? null,
            'full_text' => $request->article,
            'category_id' => $request->category,
            'user_id' => $user_id
        ]);
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        }
        return redirect()->route('admin/article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = "";
        foreach($article->tags()->pluck('name') as $name) {
            $tags .= $name.",";
        }
        if($tags){
            $tags = substr($tags, 0, -1);
        }

        return view('admin.article.edit', compact('categories', 'article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $tags = explode(',', $request->tags);
        if($request->has('image')){
            $dest = 'public/articles';
            if($article->getImage()) {
                Storage::delete($dest . '/' . $article->getImage());
            }
            $file_name = time()."_".$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs($dest, $file_name);
        }
        $tagIds = [];
        foreach ($tags as $tagName){
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            array_push($tagIds, $tag->id);
        }
        $article->tags()->sync($tagIds);

        $article->update([
           'title' => trim($request->title),
           'full_text' => $request->article,
           'image' => $file_name ?? null,
           'category_id' => $request->category,
        ]);
        return redirect()->route('admin/article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if($article->tags()->count()){
            $article->tags()->detach();
        }
        $article->delete();
        return redirect()->route('admin/article.index');
    }
}
