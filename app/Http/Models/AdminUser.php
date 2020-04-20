<?php
/**
 * Created by PhpStorm.
 * User: weishanyun
 * Date: 2020/4/19
 * Time: 11:47
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table = 'admin_users';

    protected $appends = [
        'roles_name'
    ];

    const STATUSMAP = ['禁用','正常'];

    public function roles()
    {
        return $this->belongsToMany(AdminRole::class,'admin_user_role','user_id','role_id')->withTimestamps();
    }

    /**
     * 授予用户角色
     * @param $rolesID 角色ID数组
     * @return array
     */
    public static function syncRole($rolesID)
    {
        return self::roles()->sync($rolesID);
    }

    public function getRolesNameAttribute()
    {
        $rolesNmae = array_column($this->roles->toArray(),'role_name');
        return implode(',',$rolesNmae);
    }

    public function getStatusAttribute($status)
    {
        return $this::STATUSMAP[$status];
    }


}