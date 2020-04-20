<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/static/css/font.css">
    <link rel="stylesheet" href="/static/css/weadmin.css">
    <script src="/lib/layui/layui.js" charset="utf-8"></script>

</head>
<body class="login-bg">

<div class="login">
    <div class="message">后台管理系统</div>
    <div id="darkbannerwrap"></div>

    <form class="layui-form" action="" >
        <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
        <hr class="hr15">
        <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
        <hr class="hr15">
        <input class="loginin" value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20" >
    </form>
</div>

<script type="text/javascript">
    layui.extend({
        admin: '/static/js/admin'
    });
    layui.use(['form','admin','jquery'], function(){
        var form = layui.form
            ,admin = layui.admin //使用自定义的admin扩展
            ,$ = layui.$; //使用内部自带的jquery

        //监听提交
        form.on('submit(login)', function(data){
            $.ajax({
                url:"",
                data:data.field,
                type:"post",
                dataType:"json",
                success:function(data){
                    layer.msg(data.msg);
                    setTimeout(function(){
                        location.href='/admin/index';//登陆成功
                    },1000);
                },
                error:function(data){
                    layer.error(data.msg);
                }
            });
            return false;//阻止表单提交跳转
        });
    });
</script>
<!-- 底部结束 -->
</body>
</html>