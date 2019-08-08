<?php

namespace App\Http\Controllers\Admin;

use App\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Support\Str;

class InformationController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information = Information::all();

        return view('Admin.information.list', compact('information'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.information.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fieldInformation = new Information();
        //create slug
        $slug = Str::slug($request->input('title'), '-');
        $fieldInformation->insert([
            'title' => $request->input('title'),
            'slug' => $slug,
            'content' => $request->input('content'),
            'type_input' => $request->input('type'),
            'created_at' => new DateTime(),
        ]);

        return redirect('admin/information');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $information = Information::where('id', $id)->first();

        return view('Admin.information.edit_field', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Information $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        //create slug
        $slug = Str::slug($request->input('title'), '-');
        //update
        $information->update([
            'title' => $request->input('title'),
            'slug' => $slug,
            'content' => $request->input('content'),
            'type_input' => $request->input('type'),
            'updated_at' => new DateTime(),
        ]);

        return redirect('admin/information');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Information::where('id', $id)->delete();

        return redirect('admin/information');
    }

    public function editInformation(){
        $information = Information::all();

        return view('Admin.information.edit_content', compact('information'));
    }

    public function updateInformation(Request $request){
        $informations = Information::where('slug', $request->input('slug'))->get();
//        var_dump($informations); die;
        $contents = $request->input('content');
//        $images = $request->image;
        $imageOlds = $request->input('image_old');
//        var_dump($imageOlds); die;

        foreach ($informations as $id => $info) {
            if ($info->type_input == 'image') {
                //check file
                if ($request->hasFile('content')) {
                    $files = $request->file('content');
                    foreach ($files as $file) {
                        //take file name
                        $fileNames = $file->getClientOriginalName();

                        //upload file
                        $file->move('admin/upload/', $fileNames);
//                        var_dump($a); die;

                        //update to DB
                        $info->update([
                            'content' => $fileNames,
                            'updated_at' => new DateTime()
                        ]);
                    }
                } else {
                    foreach ($imageOlds as $imageOld) {
                        $info->update([
                            'content' => $imageOld,
                            'updated_at' => new DateTime()
                        ]);
                    }
                }
            } else {
                foreach ($contents as $content) {
                    $info->update([
                        'content' => $content,
                        'updated_at' => new DateTime()
                    ]);
                }
            }
        }

        return redirect('admin/edit-information');
    }
}
