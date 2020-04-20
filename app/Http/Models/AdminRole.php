<?php
/**
 * Created by PhpStorm.
 * User: weishanyun
 * Date: 2020/4/19
 * Time: 11:48
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    protected $table = 'admin_role';

    public function roles()
    {
        return $this->belongsToMany(AdminPermission::class,'admin_role_permission','role_id','permission_id')->withTimestamps();
    }

    /**
     * 授予角色权限
     * @param $permissionsID 角色ID数组
     * @return array
     */
    public static function syncPermission($permissionsID)
    {
        return self::roles()->sync($permissionsID);
    }
}