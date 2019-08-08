<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CategoryProduct;
use App\News;
use App\Product;
use App\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DateTime;
use App\Http\Controllers\Controller;

class CategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = new Category();
        $categories = $category->getCategory();

        return view('Admin.category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        //create slug
        $slug = Str::slug($request->input('title'), '-');
        //check file
        if ($request->hasFile('image')) {
            $file = $request->image;
            //take file name
            $fileName = $file->getClientOriginalName();
            //upload file
            $file->move('admin/upload', $fileName);
        }else{
            $fileName = '';
        }
        //insert
        $category->insert([
            'title' => $request->input('title'),
            'slug' => $slug,
            'description' => $request->input('description'),
            'image' =>  $fileName,
            'role' => $request->input('role'),
            'created_at' => new DateTime()
        ]);

        return redirect('admin/category');
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
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('Admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //create slug
        $slug = Str::slug($request->input('title'), '-');
        //check file
        if ($request->hasFile('image')) {
            $file = $request->image;
            //take file name
            $fileName = $file->getClientOriginalName();
            //upload file
            $file->move('admin/upload', $fileName);

            //update to DB
            $category->update([
                'title' => $request->input('title'),
                'slug' => $slug,
                'description' => $request->input('description'),
                'image' =>  $fileName,
                'role' => $request->input('role'),
                'updated_at' => new DateTime()
            ]);
        }else{
            $category->update([
                'title' => $request->input('title'),
                'slug' => $slug,
                'description' => $request->input('description'),
                'image' =>  $request->input('image_old'),
                'role' => $request->input('role'),
                'updated_at' => new DateTime()
            ]);
        }

        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::join('category_product', 'category_product.product_id', '=', 'products.id')
            ->where('category_product.category_id', $id)
            ->delete();
        CategoryProduct::where('category_id', $id)->delete();
        News::where('category_id', $id)->delete();
        Category::where('id', $id)->delete();

        return redirect('admin/category');
    }
}
