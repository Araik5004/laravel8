<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminCreateRequest;
use App\Http\Requests\Admin\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminsController extends BaseController
{
    public $data = [];

    public function index(): View
    {
        $this->data['admins'] = Admin::getAll();
        return view('administrator.admins.index', $this->data);
    }

    public function create(): View
    {
        return view('administrator.admins.add');
    }

    public function store(AdminCreateRequest $request): Response
    {
        $addAdmin = Admin::addAdmin($request);

        if ( ! $addAdmin) {
            $request->session()->flash('error_add', trans('admin.error_add'));
            return redirect()->route('Admins');
        }

        $request->session()->flash('dane_add', trans('admin.dane_add'));
        return redirect()->route('Admins');
    }

    public function edit($id): View|Response
    {
        $admin = Admin::find($id);

        if ( ! $admin) {
            return redirect()->back();
        }

        $this->data['admin'] = $admin;
        return view('administrator.admins.edit', $this->data);
    }

    public function update(AdminUpdateRequest $request, int $id): Response
    {
        $admin = Admin::find($id);

        if ( ! $admin) {
            return redirect()->back();
        }

        $updateAdmin = Admin::updateAdmin($request, $admin);

        if ( ! $updateAdmin) {
            $request->session()->flash('error_add', trans('admin.error_add'));
            return redirect()->route('Admins');
        }

        $request->session()->flash('dane_add', trans('admin.dane_add'));
        return redirect()->route('Admins');
    }


    public function remove(Request $request): Response
    {
        $id = $request->get('id');
        $admin = Admin::find($id);

        if ( ! $admin || ! $admin->delete()) {
            return response()->json(['status' => 0]);
        }
        return response()->json(['status' => 1]);
    }
}
