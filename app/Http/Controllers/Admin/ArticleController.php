<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.articles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img = $request->file('post_img');

        $imageName = time() . '_' . Str::slug($img->getFilename()) . "." . $img->extension();

        // Public Folder
        $img->move(public_path('storage/articles'), $imageName);

        Article::query()->create([
            'image' => $imageName,
            'people_id' => 1,
            'title' => [
                'en' => $request->input('en_title'),
                'ru' => $request->input('ru_title'),
            ],
            'short_description' => [
                'en' => $request->input('en_description'),
                'ru' => $request->input('ru_description'),
            ],
            'content' => [
                'en' => $request->input('en_content'),
                'ru' => $request->input('ru_content'),
            ],
            // TODO: Make slug for articles
            // 'slug' => $request->input('slug') ?? Str::slug($request->input('en_title')),
        ]);

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
