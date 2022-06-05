<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateArticleStore;
use App\Http\Requests\ValidateArticleUpdate;
use App\Models\Article;
use App\Models\Category;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.article', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $category = Category::all();
        return view('admin.article-create', compact('user', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateArticleStore $request)
    {
        // image upload
        if  ($request->file('image') != ''){
            $image = $request->file('image');
            $nama_image   = $image->getClientOriginalName();
            $request->file('image')->move('upload', $nama_image);
        }elseif ($request->file('image') == ''){
            $nama_image = '';
        }

        $article = new Article;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->image = $nama_image;
        $article->user_id = $request->user_id;
        $article->category_id = $request->category_id;
        $article->save();

        return redirect()->route('article.index')->with('input_success','Success add article data.');
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
        $user = User::all();
        $category = Category::all();
        return view('admin.article-edit', compact('user', 'category', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateArticleUpdate $request, Article $article)
    {
         //image upload with condition 
         if  ($request->file('image') != ''){
            $image        = $request->file('image');
            $nama_image   = $image->getClientOriginalName();
            $request->file('image')->move('upload', $nama_image);
                if (file_exists(public_path($nama_image))){
                    unlink(public_path('upload/'.$article->image));
                }
            }elseif ($request->file('image') == ''){
                $nama_image = $article->image;
        }

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $nama_image,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('article.index')->with('update_success', 'Success update article data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index');
    }
}
