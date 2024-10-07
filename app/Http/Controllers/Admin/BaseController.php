<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BaseController extends Controller
{
    public $lang_admin = 'ru';
    public $localArray = '';

    public function __construct()
    {
        Lang::setLocale($this->lang_admin);
        View::share('Localization', $this->getLocal());
    }

    protected function getLocal(): array
    {
        $this->localArray = LaravelLocalization::getSupportedLocales();
        $result = [];
        $key = 0;
        foreach ($this->localArray as $prefix => $array) {
            $result[$key]['prefix'] = $prefix;
            $result[$key]['name'] = $array['native'];
            $key++;
        }

        return $result;
    }

}
