<?php
/**
 * Created by PhpStorm.
 * User: weishanyun
 * Date: 2020/4/19
 * Time: 10:35
 */

namespace App\Http\Controllers\Admin\System;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\AdminUser as Model;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $pageSzie = $request->page_size ?? config('admin.page.size');
        $where = [];
        if($request->keyword)
        {
            $where['id|username'] = $request->keyword;
        }
        $data = Model::with([])->where($where)->paginate($pageSzie);
        return view('admin.system.adminuser.index',['list'=>$data]);
    }

    public function add(Request $request)
    {
//        if()
//        {
//
//        }
        return view('admin.system.adminuser.add');
    }
}