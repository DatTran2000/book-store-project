<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserController extends Controller
{
    public function index() {

        // $role = Role::create(['name' => 'user_2']); // tạo 1 nhà báo (role)
        // $permission = Permission::create(['name' => 'delete articles']); // tạo quyền được làm gì đó

        // $role->givePermissionTo($permission); // cấp quyền cho nhà báo

        // $users = User::role('writer')->get() => lấy tất cả user có vai trò là writer
        // $users = User::permission('edit articles')->get(); => lấy tất cả user có quyền là edit

        $user = User::find(1);
        // $user->givePermissionTo('edit articles', 'delete articles'); // trao quyền cho 1 user
        // $user->syncPermissions(['edit articles', 'delete articles']); // them or xoa
        // $user->hasPermissionTo('edit articles'); // check permission
        // $user->assignRole('writer'); // cap vai tro
        // $user->removeRole('writer'); // xoa vai tro

    }
}
