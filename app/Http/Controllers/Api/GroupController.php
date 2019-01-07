<?php

namespace App\Http\Controllers\Api;

use App\Models\Group;
use App\Http\Resources\GroupResource;
use App\Http\Requests\Api\GroupRequest;

class GroupController extends ApiController
{
    public function __construct()
    {

    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return GroupResource::collection(Group::all());
    }

    public function update(GroupRequest $request, Group $group)
    {
        $group->update($request->requestAttributes());
        return $this->respondSuccess();
    }

    public function store(GroupRequest $request)
    {
        $group = Group::create($request->requestAttributes());
        return new GroupResource($group);
    }

    public function show(Group $group)
    {
        return new GroupResource($group);
    }

    public function destroy(Group $group)
    {
        if($group->delete())
        {
            return $this->respondSuccess();
        }

        return $this->respondError('Unable to delete Group',500);

    }
}
