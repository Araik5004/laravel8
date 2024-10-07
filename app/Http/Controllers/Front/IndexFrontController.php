<?php

namespace App\Http\Controllers\Front;

use Illuminate\Contracts\View\View;

class IndexFrontController extends Controller
{
    public function index(): View
    {
        return view('welcome');
    }
}
