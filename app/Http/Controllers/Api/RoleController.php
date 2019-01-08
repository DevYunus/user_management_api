<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Http\Resources\RoleResource;
use App\Http\Requests\Api\RoleRequest;

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
        return RoleResource::collection(Role::all());
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

        return $this->respondError('Unable to delete Role',500);

    }
}
