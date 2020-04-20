<?php
/**
 * Created by PhpStorm.
 * User: weishanyun
 * Date: 2020/4/19
 * Time: 11:19
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminSystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //管理员
        Schema::create('admin_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->nullable(false)->unique()->comment('用户名');
            $table->string('password')->nullable(false)->comment('密码');
            $table->string('token')->nullable(true)->comment('登陆token');
            $table->integer('token_expired')->nullable(true)->comment('登陆token过期时间戳');
            $table->tinyInteger('status')->default(1)->nullable(false)->comment('状态：1正常，0禁用');
            $table->timestamps();
        });

        //角色
        Schema::create('admin_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role_name')->unique()->nullable(false)->comment('角色名称');
            $table->string('role_code')->unique()->nullable(false)->comment('角色标识');
            $table->timestamps();
        });

        //权限
        Schema::create('admin_permission', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('permission_name')->unique()->nullable(false)->comment('权限名称');
            $table->string('permission_code')->unique()->nullable(false)->comment('权限标识');
            $table->string('path_url')->unique()->nullable(true)->comment('权限URL地址');
            $table->tinyInteger('is_menu')->default(1)->nullable(true)->comment('是否是菜单：0否，1是');
            $table->timestamps();
        });

        //用户角色关联
        Schema::create('admin_user_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable(false)->comment('用户ID');
            $table->integer('role_id')->nullable(false)->comment('角色ID');
            $table->timestamps();
        });

        //角色权限关联表
        Schema::create('admin_role_permission', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('role_id')->nullable(false)->comment('角色ID');
            $table->integer('permission_id')->nullable(false)->comment('权限ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
        Schema::dropIfExists('admin_role');
        Schema::dropIfExists('admin_permission');
        Schema::dropIfExists('admin_user_role');
        Schema::dropIfExists('admin_role_permission');
    }
}