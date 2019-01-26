<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Core\Transformers\ProfileTransformer;

class ProfileController extends ApiController
{
    /**
     * ProfileController constructor.
     *
     * @param ProfileTransformer $transformer
     */
    public function __construct(ProfileTransformer $transformer)
    {
        $this->transformer = $transformer;

        $this->middleware('auth.api')->except('show');
        $this->middleware('auth.api:optional')->only('show');
    }

    /**
     * Get the profile of the user given by their username
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return $this->respondWithTransformer($user);
    }

    public function update(User $user, Request $request)
    {

    }


}
