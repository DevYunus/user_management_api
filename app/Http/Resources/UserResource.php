<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'starred' => $this->starred_at?true:false,
            'phone' => $this->phone,
            'email' => $this->email,
            'createdAt' => optional($this->created_at)->format("Y-m-d H:i:s"),
            'updatedAt' => optional($this->updated_at)->format("Y-m-d H:i:s"),
            'roles' => RoleResource::collection($this->whenLoaded('roles')),
        ];
    }
}
