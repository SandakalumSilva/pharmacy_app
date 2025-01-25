<?php

namespace App\Repositories;

use App\Interfaces\RoleInterface;
use App\Models\PermissionCategory;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleInterface
{
    public function allRoles()
    {
        $roles = Role::all();
        return view('backend.roles.all_roles', compact('roles'));
    }

    public function addRoles()
    {
        return view('backend.roles.add_roles');
    }
    public function storeRoles($request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);
        $role = Role::create([
            'name' => $request->name
        ]);

        $notification = array(
            'message' => 'Role Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }


    public function editRoles($id)
    {
        $role = Role::findOrFail($id);
        return view('backend.roles.edit_roles', compact('role'));
    }

    public function updateRoles($request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $id = $request->id;
        Role::findOrFail($id)->update([
            'name' => $request->name
        ]);

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }

    public function deleteRole($id)
    {
        Role::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }

    public function allPermission()
    {

        $permissions = Permission::all();
        return view('backend.permission.all_permission', compact('permissions'));
    }

    public function addPermission()
    {
        $permissionCategory = PermissionCategory::all();
        return view('backend.permission.add_permission', compact('permissionCategory'));
    }

    public function storePermission($request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required'
        ], [
            'name.required' => 'Please Add Permission Name',
            'category.required' => 'Please Select Permision Category'
        ]);

        $role = Permission::create([
            'name' => $request->name,
            'category_id' => $request->category
        ]);

        $notification = array(
            'message' => 'Permission Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    }

    public function editPermission($id)
    {
        $permission = Permission::findOrFail($id);
        return view('backend.permission.edit_permission', compact('permission'));
    }

    public function updatePermission($request)
    {
        $id = $request->id;

        $request->validate([
            'name' => 'required'
        ]);

        Permission::findOrFail($id)->update([
            'name' => $request->name
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    }

    public function deletePermission($id)
    {
        Permission::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    }

    public function addRolePermission()
    {
        $roles = Role::all();
        $allPermissionCategory = PermissionCategory::all();
        return view('backend.permission.add_role_permission', compact('allPermissionCategory', 'roles'));
    }

    public function rolePermissionStore($request)
    {
        $validate = $request->validate([
            'permission' => 'required',
            'role_id' => 'required'
        ], [
            'permission.required' => 'Please Select The Permissions.',
            'role_id.required' => 'Please Select The Role.'
        ]);

        $data = array();
        $permissions = $request->permission;

        $hasRole = DB::table('role_has_permissions')
            ->select('role_has_permissions.role_id')
            ->where('role_id', $request->role_id)
            ->get();
        // var_dump($hasRole);
        // exit();
        // if (!empty($hasRole)) {
        //     $notification = array(
        //         'message' => "Role Permission Already Added Please Update this Role.",
        //         'alert-type' => 'error'
        //     );

        //     return redirect()->back()->with($notification);
        // }
        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array(
            'message' => "Role Permission Added Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function allRolePermission()
    {
        $roles = Role::all();
        return view('backend.permission.all_roles_permission', compact('roles'));
    }

    public function editRolePermission($id)
    {
        $roles = Role::findOrFail($id);
        $permissions = Permission::all();
        $allPermissionCategory = PermissionCategory::all();
        return view('backend.permission.edit_roles_permission', compact(
            'roles',
            'permissions',
            'allPermissionCategory'
        ));
    }

    public function rolePermissionUpdate($request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);
    }

    
}
