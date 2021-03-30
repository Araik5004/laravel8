<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminsController extends BaseController
{

    public $data = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['admins'] = Admin::GetAll();
        /*
        echo "<pre>";
        print_r($this->data['admins']);
        echo "</pre>";
        die;
         * 
         */
        return view('Administrator.admins.index' , $this->data);
    }
    
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Administrator.admins.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:admins',
        ]);

        $InsertAdmin = Admin::addAdmin($request);
        
        if(!$InsertAdmin) 
        {
            $request->session()->flash( 'error_add' , trans('admin.error_add') );
            return redirect()->route('Admins');
        }

        $request->session()->flash( 'dane_add' , trans('admin.dane_add') );
        return redirect()->route('Admins');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        
        if(!$admin) 
        {
            return redirect()->back();
        }
        
        $this->data['admin'] = $admin;
        return view('Administrator.admins.edit' , $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
        ]);
        
        $count = Admin::where('id', '!=', $id)->where('email', $request->email)->count();
        
        if ($count) 
        {
           return redirect()->route('Admins');
        }
        
        $admin = Admin::find($id);

        if(!$admin) 
        {
            return redirect()->back();
        }
        
        $updateAdmin = Admin::UpdateAdmin($request , $admin);
        
        if(!$updateAdmin) 
        {
            $request->session()->flash( 'error_add' , trans('admin.error_add') );
            return redirect()->route('Admins');
        }

        $request->session()->flash( 'dane_add' , trans('admin.dane_add') );
        return redirect()->route('Admins');
    }


    public function remove( Request $request) 
    {
        $id = $request->id;
        $admin = Admin::find($id);

        if(!$admin) 
        {
            return response()->json(['status' => 0]);
        }

        if(!$admin->delete())
        { 
            return response()->json(['status' => 0]);
        }

        return response()->json(['status' => 1]);
    }
}
