<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class NewsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::join('categories', 'categories.id', '=', 'news.category_id')
            ->select(
                'news.*',
                'categories.id as idCategory',
                'categories.title as titleCategory'
            )
            ->get();

        return view('Admin.news.list', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('role', '2')->get();

        return view('Admin.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News();

        //create slug
        $slug = Str::slug($request->input('title'), '-');

        $news->insert([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'slug' => $slug,
            'category_id' => $request->input('category'),
            'created_at' => new DateTime()
        ]);

        return redirect('admin/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $category = Category::where('role', '2')->get();

        return view('Admin.news.edit', compact('news', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //create slug
        $slug = Str::slug($request->input('title'), '-');

        $news->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'slug' => $slug,
            'category_id' => $request->input('category'),
            'created_at' => new DateTime()
        ]);

        return redirect('admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::where('id', $id)->delete();

        return redirect('admin/news');
    }
}
