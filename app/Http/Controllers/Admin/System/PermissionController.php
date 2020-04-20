<?php
/**
 * Created by PhpStorm.
 * User: weishanyun
 * Date: 2020/4/19
 * Time: 21:49
 */

namespace App\Http\Controllers\Admin\System;


use App\Http\Controllers\Controller;
use App\Http\Models\AdminPermission as Model;

class PermissionController extends Controller
{
    public function index()
    {
        $pageSzie = $request->page_size ?? config('admin.page.size');
        $where = [];
        if($request->keyword)
        {
            $where['id|permission_name|permission_code'] = $request->keyword;
        }
        $data = Model::with([])->where($where)->paginate($pageSzie);
        return view('admin.system.permission.index',['list'=>$data]);
    }
}