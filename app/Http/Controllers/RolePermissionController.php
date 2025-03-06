<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\PermissionRequest;
use App\Http\Resources\PermissionResource;

class RolePermissionController extends Controller
{
    public function getRoles()
    {
        $roles = Role::all();
        return RoleResource::collection($roles);
    }

    public function getPermissions()
    {
        $permissions = Permission::all();
        return PermissionResource::collection($permissions);
    }

    // Role
    public function addRole(RoleRequest $request)
    {
        return new RoleResource(Role::create($request->validated()));
    }

    public function removeRole(Role $role)
    {
        $role->delete();
        return new RoleResource($role);
    }

    public function updateRole(Role $role, RoleRequest $request)
    {
        $role->update($request->validated());
        return new RoleResource($role);
    }

    public function showRole(Role $role)
    {
        return new RoleResource($role);
    }

    public function getRolesOfPermission(Permission $permission)
    {
        return RoleResource::collection($permission->roles);
    }


    public function addPermissionToRole(Role $role, $permission)
    {
        $role->givePermissionTo($permission);
        return new RoleResource($role);
    }

    public function updatePermissionToRole(Role $role, Request $request)
    {
        $role->syncPermissions($request->permissions);
        return new RoleResource($role);
    }

    public function removePermissionFromRole(Role $role, $permission)
    {
        $role->revokePermissionTo($permission);
        return new RoleResource($role);
    }


    // Permission
    public function addPermission(PermissionRequest $request)
    {
        return new PermissionResource(Permission::create($request->validated()));
    }

    public function updatePermission(Permission $permission, PermissionRequest $request)
    {
        $permission->update($request->validated());
        return new PermissionResource($permission);
    }

    public function removePermission(Permission $permission)
    {
        $permission->delete();
        return new PermissionResource($permission);
    }

    public function showPermission(Permission $permission)
    {
        return new PermissionResource($permission);
    }

    public function getPermissionsOfRole(Role $role)
    {
        return PermissionResource::collection($role->permissions);
    }

    // User
    public function addRoleToUser(User $user, $role)
    {
        $user->assignRole($role);
        return new UserResource($user);
    }

    public function removeRoleFromUser(User $user, $role)
    {
        $user->removeRole($role);
        return new UserResource($user);
    }

    public function addPermissionToUser(User $user, $permission)
    {
        $user->givePermissionTo($permission);
        return new UserResource($user);
    }

    public function updatePermissionToUser(User $user, Request $request)
    {
        $user->syncPermissions($request->permissions);
        return new UserResource($user);
    }

    public function removePermissionFromUser(User $user, $permission)
    {
        $user->revokePermissionTo($permission);
        return new UserResource($user);
    }

    public function getRolesOfUser(User $user)
    {
        return RoleResource::collection($user->roles);
    }

    public function getPermissionsOfUser(User $user)
    {
        return PermissionResource::collection($user->permissions);
    }
}
