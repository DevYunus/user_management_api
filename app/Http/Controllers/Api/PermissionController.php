<?php

namespace App\Http\Controllers\Api;

use App\Models\Permission;
use App\Http\Resources\PermissionResource;
use App\Http\Requests\Api\PermissionRequest;

class PermissionController extends ApiController
{
    public function __construct()
    {

    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PermissionResource::collection(Permission::all());
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->requestAttributes());
        return $this->respondSuccess();
    }

    public function store(PermissionRequest $request)
    {
        $permission = Permission::create($request->requestAttributes());
        return new PermissionResource($permission);
    }

    public function show(Permission $permission)
    {
        return new PermissionResource($permission);
    }

    public function destroy(Permission $permission)
    {
        if($permission->delete())
        {
            return $this->respondSuccess();
        }

        return $this->respondError('Unable to delete Permission',500);

    }
}
