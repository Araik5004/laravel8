<?php

namespace App\Http\Controllers\Front;


class IndexFrontController extends Controller
{

    public function index()
    {
        return view( 'welcome', [
        ] );
    }

}
