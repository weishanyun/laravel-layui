@extends('admin.layout.base')

@section('content')
    <div class="layui-row">
        <form class="layui-form layui-col-md12 we-search">
            <div class="layui-inline">
                <input type="text" name="keyword" placeholder="ID|用户名" autocomplete="off" class="layui-input">
            </div>
            <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
    </div>
    <div class="weadmin-block">
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="WeAdminShow('添加用户','./add')"><i class="layui-icon"></i>添加</button>
        <span class="fr" style="line-height:40px">共有数据：{{ $list->count() }} 条</span>
    </div>
    <table class="layui-table">
        <thead>
            <tr>
                <th>
                    <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                </th>
                <th>ID</th>
                <th>用户名</th>
                <th>角色</th>
                <th>状态</th>
                <th>修改时间</th>
                <th>添加时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $item)
            <tr>
                <td style="width: 20px">
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
                </td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->roles_name }}</td>
                <td><span class="layui-btn layui-btn-normal layui-btn-xs">{{ $item->status }}</span></td>
                <td>{{ $item->updated_at }}</td>
                <td>{{ $item->created_at }}</td>
                <td class="td-manage">
                    <a title="编辑" onclick="WeAdminShow('编辑','./edit.html')" href="javascript:;">
                        <i class="layui-icon">&#xe642;</i>
                    </a>
                    <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="page">
        {{ $list->links() }}
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        //面包屑写在了admin扩展中一定要加入扩展否则面包屑出不来
        layui.extend({
            admin: '/static/js/admin'
        });
        layui.use(['laydate', 'jquery', 'admin'], function() {
            var $ = layui.jquery,
                admin = layui.admin;
        });
    </script>
@endsection