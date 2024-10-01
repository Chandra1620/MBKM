<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class MengelolaRolePermissionController extends Controller
{
    public function role()
    {
        $role = Role::all();
        $allpermission = Permission::all();
        return view('admin.system.mengelola_role.index', compact(['role', 'allpermission']));
    }
    public function store_role(Request $request)
    {
        $attrs = $request->validate([
            'nama_role' => 'required|unique:roles,name',
        ]);
        Role::create([
            'name' => $attrs['nama_role'],
        ]);

        return redirect()
            ->route('mengelola-role.index')
            ->with('success', 'berhasil menambah role');
    }
    public function update_role(Request $request, $id)
    {
        $role = Role::findById($id);
        if (!$role) {
            dd('ngaco');
        }
        $attrs = $request->validate([
            'nama_role' => 'required|unique:roles,name',
        ]);
        $role->name = $attrs['nama_role'];
        $role->save();
        return redirect()
            ->route('mengelola-role.index')
            ->with('success', 'berhasil memperbarui role');
    }

    public function update_role_permission(Request $request, $id)
    {
        $role = Role::findById($id);

        if (!$role) {
            dd('ngaco');
        }

        $request->validate([
            'permissions' => 'exists:permissions,id|array',
        ]);

        $permissionIds = $request->input('permissions');

        $permissions = [];

        // Check if the permissions array is not empty before fetching Permission models
        if (!empty($permissionIds)) {
            $permissions = Permission::whereIn('id', $permissionIds)->get();
        }

        // Use syncPermissions only if there are permissions to synchronize
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        } else {
            // If permissions array is empty, remove all permissions from the role
            $role->syncPermissions([]);
        }

        return redirect()
            ->route('mengelola-role.index')
            ->with('success', 'berhasil memperbarui role');
    }

    public function store_permission(Request $request)
    {
        $attrs = $request->validate([
            'nama_permission' => 'required|unique:permissions,name',
        ]);
        Permission::create([
            'name' => $attrs['nama_permission'],
        ]);

        return redirect()
            ->route('mengelola-permission.index')
            ->with('success', 'berhasil menambah permission');
    }
    public function permission()
    {
        $permission = Permission::all();

        return view('admin.system.mengelola_permission.index', compact('permission'));
    }

    public function update_permission(Request $request, $id)
    {
        $permission = Permission::findById($id);
        if (!$permission) {
            dd('ngaco');
        }
        $attrs = $request->validate([
            'nama_permission' => 'required|unique:permissions,name',
        ]);
        $permission->name = $attrs['nama_permission'];
        $permission->save();
        return redirect()
            ->route('mengelola-permission.index')
            ->with('success', 'berhasil memperbarui permission');
    }
    public function delete_permission($id)
    {
        $permission = Permission::findById($id);
        if (!$permission) {
            dd('ngaco');
        }
        $permission->delete();
        return redirect()
            ->route('mengelola-permission.index')
            ->with('success', 'berhasil menghapus permission');
    }

    public function userHasRole()
    {
        $user = User::where('name', '!=', 'admin')->get();
        $usersWithRoles = User::has('roles')->with('roles')->get();
        // dd($usersWithRoles);
        return view('admin.system.mengelola_user_role.index', compact(['usersWithRoles','user']));
    }
    public function deletedUserHasRole($id){
        $user = User::find($id);
        if(!$user){
            return redirect()->route('mengelola-user-role.index')->with('error','tidak ada user');

        }

        $user->syncRoles([]);
        return redirect()->route('mengelola-user-role.index')->with('success','berhasil');;
    }



}
