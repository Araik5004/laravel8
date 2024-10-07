<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * @method static find(mixed $idAdmin)
 */
class Admin extends Model
{
    protected $fillable = array('name', 'surname', 'password', 'email');
    private $name;
    private $surname;
    protected $email;
    private $password;

    public static function isLogin(): bool
    {
        if ( ! Session::has('admin')) {
            return false;
        }

        if ( ! Admin::find(Session::get('admin'))) {
            return false;
        }

        return true;
    }

    public static function getInfo()
    {
        $adminId = Session::get('admin');
        return Admin::find($adminId);
    }

    public static function addAdmin(Request $request): bool
    {
        $newAdmin = new Admin();
        $newAdmin->setName($request->get('name'));
        $newAdmin->setSurname($request->get('surname'));
        $newAdmin->setEmail($request->get('email'));
        $newAdmin->setPassword($request->get('password'));

        if ($newAdmin->save()) {
            return true;
        }

        return false;
    }

    public static function updateAdmin(Request $request, Admin $admin): bool
    {
        if ($request->get('password')) {
            $update = $admin->update([
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'email' => $request->get('email'),
                'password' => sha1($request->get('password'))
            ]);
        } else {
            $update = $admin->update([
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'email' => $request->get('email'),
            ]);
        }

        return $update;
    }

    public static function getAll()
    {
        return Admin::all();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }
}
