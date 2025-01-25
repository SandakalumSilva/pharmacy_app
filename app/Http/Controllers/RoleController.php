<?php

namespace App\Http\Controllers;

use App\Interfaces\RoleInterface;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleRepository;
    public function __construct(RoleInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function allRoles()
    {
        return $this->roleRepository->allRoles();
    }

    public function addRoles()
    {
        return $this->roleRepository->addRoles();
    }

    public function storeRoles(Request  $request)
    {
        return $this->roleRepository->storeRoles($request);
    }

    public function editRoles($id)
    {
        return $this->roleRepository->editRoles($id);
    }

    public function updateRoles(Request $request)
    {
        return $this->roleRepository->updateRoles($request);
    }

    public function deleteRole($id)
    {
        return $this->roleRepository->deleteRole($id);
    }

    public function allPermission()
    {
        return $this->roleRepository->allPermission();
    }

    public function addPermission()
    {
        return $this->roleRepository->addPermission();
    }

    public function storePermission(Request $request)
    {
        return $this->roleRepository->storePermission($request);
    }

    public function editPermission($id)
    {
        return $this->roleRepository->editPermission($id);
    }

    public function updatePermission(Request $request)
    {
        return $this->roleRepository->updatePermission($request);
    }

    public function deletePermission($id)
    {
        return $this->roleRepository->deletePermission($id);
    }

    public function addRolePermission()
    {
        return $this->roleRepository->addRolePermission();
    }

    public function rolePermissionStore(Request $request)
    {
        return $this->roleRepository->rolePermissionStore($request);
    }

    public function allRolePermission()
    {
        return $this->roleRepository->allRolePermission();
    }

    public function editRolePermission($id)
    {
        return $this->roleRepository->editRolePermission($id);
    }

    public function rolePermissionUpdate(Request $request, $id)
    {
        return $this->roleRepository->rolePermissionUpdate($request, $id);
    }

    // public function storeRolePermission(Request $request){
    //     return $this->roleRepository->storeRolePermission($request);
    // }

}
