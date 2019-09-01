<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Http\Resources\RoleResource;
use App\Http\Requests\Api\RoleRequest;
use App\Models\Permission;

class RoleController extends ApiController
{
    public function __construct()
    {

    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return RoleResource::collection(Role::with('permissions')->paginate(200));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->requestAttributes());

        $role->syncPermissions();

        return $this->respondSuccess();
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create($request->requestAttributes());

        $role->syncPermissions();

        return new RoleResource($role);
    }

    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    public function destroy(Role $role)
    {
        if($role->delete())
        {
            return $this->respondSuccess();
        }

        return $this->respondError('Unable to delete Role', 500);

    }

    public function togglePermission(Role $role, Permission $permission)
    {
        if($role->permissions()->toggle($permission)){
            return $this->respondCreated(['roleId'=>$role->id]);
        }


        return $this->respondError('Unable to toggle permission', 500);
    }
}
