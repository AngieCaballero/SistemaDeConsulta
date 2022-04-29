<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Exception;

class UsersController extends Controller
{
    public function getUsers()
    {
        $Users = User::all();
        return $Users;
    }

    public function createUser(Request $request)
    {
        try {
            $request = $request->all();
            $User = new User();
            $User->name = $request['name'];
            $User->password = bcrypt($request['password']);
            if($request['admin'] == 'true')
                $User->admin = true;
            else{
                $User->admin = false;
            }
            $User->save();
            return "Se guardaron los datos correctamente";
        }
        catch(Exception $e){

            return "Error: " + $e->getMessage();
        }
    }

    public function editUser(Request $request)
    {
        try {
            $request = $request->all();
            $User = User::find($request['id']);
            $User->name = $request['name'];
            if ($request['password'] != "") {
                $User->password = bcrypt($request['password']);
            }
            $User->save();

            return "Se han actualizado los datos exitosamente!";

        } catch(Exception $e){
            return "Error: " + $e->getMessage();
        }
    }

    public function deleteUser($id)
    {
        try {

            $User = User::find($id);
            $User->delete();
            return "Usuario eliminado";

        } catch(Exception $e)
        {
            return "Error: " + $e->getMessage();
        }
    }

    public function changeAdmin($id)
    {
        try {
            $User = User::find($id);
            $User->admin = !$User->admin;
            $User->save();

            return "Se han actualizado los datos exitosamente!";

        } catch(Exception $e)
        {
            return "Error: " + $e->getMessage();
        }
    }
}
