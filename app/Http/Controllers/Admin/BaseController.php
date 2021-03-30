<?php

namespace App\Http\Controllers\Admin;

use LaravelLocalization;
use Illuminate\Http\Request;
use View;
use App\Admin;
use Lang;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{

    public $lang_admin = 'ru';

    public function __construct()
    {
        Lang::setLocale( $this->lang_admin );
        View::share( 'Localization', $this->getLocal() );
    }

    protected function getLocal()
    {
        $this->localArray = LaravelLocalization::getSupportedLocales();
        $result = [];
        $Key = 0;
        foreach ( $this->localArray as $prefix => $array )
        {
            $result[ $Key ][ 'prefix' ] = $prefix;
            $result[ $Key ][ 'name' ] = $array[ 'native' ];
            $Key++;
        }

        return $result;
    }

}
