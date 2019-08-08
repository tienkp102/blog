<?php

namespace App\Http\Controllers\Admin;

use App\Introduce;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntroduceController extends AdminController
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Introduce $introduce
     * @return \Illuminate\Http\Response
     */
    public function edit(Introduce $introduce)
    {
        return view('Admin.introduce.edit', compact('introduce'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Introduce $introduce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Introduce $introduce)
    {
        $introduce->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'updated_at' => new DateTime()
        ]);

        return redirect('admin/introduce');
    }
}
