<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if($request->method() == 'POST')
        {
            return response()->json(['code'=>1,'msg'=>'登陆成功']);
        }
        return view('admin.login');
    }
}
