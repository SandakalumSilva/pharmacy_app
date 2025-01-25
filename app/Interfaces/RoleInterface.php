<?php

namespace App\Interfaces;

interface RoleInterface
{

    public function allRoles();
    public function addRoles();
    public function storeRoles($request);
    public function editRoles($id);
    public function updateRoles($request);
    public function deleteRole($id);
    public function allPermission();
    public function addPermission();
    public function storePermission($request);
    public function editPermission($id);
    public function updatePermission($request);
    public function deletePermission($id);
    public function addRolePermission();
    public function rolePermissionStore($request);
    public function allRolePermission();
    public function editRolePermission($id);
    public function rolePermissionUpdate($request, $id);
}
