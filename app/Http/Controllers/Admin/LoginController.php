<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminLoginSingInRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends BaseController
{
    public function index()
    {
        return view('Administrator.login.index');
    }

    public function singIn(AdminLoginSingInRequest $request): Response
    {
        $admin = Admin::where('email', $request->get('email'))
            ->where('password', sha1($request->get('password')))
            ->first();

        if ( ! $admin) {
            return redirect()->back();
        }

        Session::put('admin', $admin->id);

        return redirect()->route('AdminMainPage');
    }

    public function logout(): Response
    {
        if (Admin::isLogin()) {
            Session::forget('admin');

            return response()->json([
                'status' => 1
            ]);
        }

        return response()->json([
            'status' => 0
        ]);
    }
}
