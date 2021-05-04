<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Notificacion;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{

    



    public function index(Request $request)
    { 
        if (\Auth::user()->hasRole('Administrador'))
     {
        $logins = Login::WithUser()->search($request->q)->orderBy('login_at', 'desc')->paginate(10);
        $roles = Role::get();
        return view('admin.login.index',  compact('roles','logins'));
    }
        $logins = Login::WithUser()->where('user_id', auth()->user()->id)->get();
        $roles = Role::get();
        return view('admin.login.index',  compact('roles','logins'));
    }




    public function show($id)
    {
        $logins = Login::with('user')->find(\Hashids::decode($id)[0])->get();
        $roles = Role::get();
        return view('admin.login.show',compact('logins','roles'));

    }


}
