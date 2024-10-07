<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends BaseController
{

    public function index()
    {
        return view( 'Administrator.login.index' );
    }

    public function singin( Request $request )
    {
        $this->validate( $request, [
            'password' => 'required',
            'email' => 'required|email'
        ] );

        $AdminExist = Admin::where( 'email', $request->get('email') )
                ->where( 'password', sha1( $request->get('password') ) )
                ->first();

        if ( !$AdminExist )
        {
            return redirect()->back();
        }

        Session::put( 'admin', $AdminExist->id );

        return redirect()->route( 'AdminMainPage' );
    }

    public function logout()
    {
        if ( Admin::isLogin() )
        {
            Session::forget( 'admin' );
            return response()->json( [
                        'status' => 1
                    ] );
        }

        return response()->json( [
                    'status' => 0
                ] );
    }

}
