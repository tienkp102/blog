<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CategoryProduct;
use App\Product;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ProductController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = new Product();
        $products = $product->showProduct();

        return view('Admin.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('role', '1')->get();

        return view('Admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $categoryProduct = new CategoryProduct();

        //create slug
        $slug = Str::slug($request->input('name'), '-');

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

        $productId = $product->insertGetId([
            'name' => $request->input('name'),
            'slug' => $slug,
            'description' => $request->input('description'),
            'image' => $fileName,
            'price' => $request->input('price'),
            'content' => $request->input('content'),
            'created_at' => new DateTime()
        ]);

        $categoryProduct->insert([
            'category_id' => $request->input('category'),
            'product_id' => $productId,
            'created_at' => new DateTime()
        ]);

        return redirect('admin/product');
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
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::leftJoin('category_product', 'category_product.category_id', '=', 'categories.id')
            ->where('role', '1')
            ->select(
                'categories.*',
                'category_product.category_id'
            )
            ->get();

        return view('Admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $categoryProduct = CategoryProduct::where('product_id', $product->id)->first();
        //create slug
        $slug = Str::slug($request->input('name'), '-');

        //update categoryProduct
        if(isset($categoryProduct)) {
            $categoryProduct->update([
                'category_id' => $request->input('category'),
                'updated_at' => new DateTime()
            ]);
        }

        //check file
        if ($request->hasFile('image')) {
            $file = $request->image;
            //take file name
            $fileName = $file->getClientOriginalName();
            //upload file
            $file->move('admin/upload', $fileName);
            //update to database
            $product->update([
                'name' => $request->input('name'),
                'slug' => $slug,
                'description' => $request->input('description'),
                'image' => $fileName,
                'price' => $request->input('price'),
                'content' => $request->input('content'),
                'updated_at' => new DateTime()
            ]);
        }else{
            $product->update([
                'name' => $request->input('name'),
                'slug' => $slug,
                'description' => $request->input('description'),
                'image' => $request->input('image_old'),
                'price' => $request->input('price'),
                'content' => $request->input('content'),
                'updated_at' => new DateTime()
            ]);
        }

        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryProduct::where('product_id', $id)->delete();
        Product::where('id', $id)->delete();

        return redirect('admin/product');
    }
}
