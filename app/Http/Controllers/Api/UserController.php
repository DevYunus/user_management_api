<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Carbon\Carbon;

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
        $this->authorize('list_user');

        return UserResource::collection(User::paginate(20));
    }

    public function update(UserRequest $request, User $user)
    {
        // $this->authorize('update_user');

        $user->update($request->requestAttributes());

        $user->syncRoles();

        return $this->respondSuccess();
    }

    public function store(UserRequest $request)
    {
        $this->authorize('add_user');

        $user = User::create($request->requestAttributes());

        $user->syncRoles();

        return new UserResource($user);
    }

    public function show(User $user)
    {
        $this->authorize('view_user');

        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $this->authorize('delete_user');

        if ($user->isAdmin()) {
            return $this->respondError('Admin user could not be deleted', 422);
        }

        if ($user->delete()) {
            return $this->respondSuccess();
        }

        return $this->respondError('Unable to delete user', 500);

    }

    public function favorite(User $user)
    {
        $user->starred_at = $user->starred_at?NULL:Carbon::now();
        $user->save();
        return new UserResource($user);
    }
}
