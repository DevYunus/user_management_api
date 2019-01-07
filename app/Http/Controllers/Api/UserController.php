<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends ApiController
{
    public function __construct()
    {

    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->requestAttributes());
        return $this->respondSuccess();
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->requestAttributes());
        return new UserResource($user);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        if($user->delete())
        {
            return $this->respondSuccess();
        }

        return $this->respondError('Unable to delete user',500);

    }
}
