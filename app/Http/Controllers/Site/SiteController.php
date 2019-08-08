<?php

namespace App\Http\Controllers\Site;

use App\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function __construct()
    {
        $informations = Information::get();

        $infor = array();

        foreach ($informations as $id => $info){
             $infor[$info->slug] = $info->content;
        }

        view()->share([
            'information' => $infor
        ]);
    }
}
