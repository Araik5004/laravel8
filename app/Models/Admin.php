<?php

namespace App\Models;

use Session;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    protected $fillable = array('name', 'surname', 'password', 'email');

    /**
     * Check if a user is logged in.
     * @return bool
     */
    public static function isLogin()
    {

        if ( !Session::has( 'admin' ) )
        {
            return false;
        }
        $idAdmin = Session::get( 'admin' );
        $AdminExist = Admin::find( $idAdmin );

        if ( !$AdminExist )
        {
            return false;
        }

        return true;
    }

    public static function getInfo()
    {
        $idAdmin = Session::get( 'admin' );
        $AdminExist = Admin::find( $idAdmin );

        return $AdminExist;
    }

    public static function addAdmin( $request )
    {
        $NewAdmin = new Admin();
        $NewAdmin->name = $request->name;
        $NewAdmin->surname = $request->surname;
        $NewAdmin->email = $request->email;
        $NewAdmin->password = sha1( $request->password );

        if ( $NewAdmin->save() )
        {
            return true;
        }

        return false;
    }

    public static function updateAdmin( $request, $admin )
    {
        if ( $request->password )
        {
            $update = $admin->update( [
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'password' => sha1( $request->password )
            ] );
        } else
        {
            $update = $admin->update( [
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
            ] );
        }

        if ( $update )
        {
            return true;
        }

        return false;
    }

    public static function GetAll()
    {
        return Admin::all();
    }

}
