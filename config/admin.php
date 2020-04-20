<?php
/**
 * Created by PhpStorm.
 * User: weishanyun
 * Date: 2020/4/19
 * Time: 9:50
 */

return [
    'page'=>[
        'szie'=>20
    ],
    'menu'=>[
        [
            'id'=>'1',
            'name'=>'系统设置',
            'icon'=>'layui-icon-set-fill',
            'url'=>'',
            'children'=>[
                [
                    'id'=>2,
                    'name'=>'管理员列表',
                    'icon'=>'',
                    'url'=>'/admin/adminuser/index'
                ],
                [
                    'id'=>3,
                    'name'=>'角色管理',
                    'icon'=>'',
                    'url'=>'/admin/roles/index',
                ],
                [
                    'id'=>4,
                    'name'=>'权限管理',
                    'icon'=>'',
                    'url'=>'/admin/permission/index',
                ]
            ]
        ]
    ]
];