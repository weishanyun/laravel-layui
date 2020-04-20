<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function main()
    {
        return view('admin.main');
    }

    public function menu()
    {
        $data = config('admin.menu');
        return response()->json(['code'=>1,'msg'=>'OK','data'=>$data]);
    }
}
