<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /* @var User|self $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
//            'age' => $this->age,
            'salary' => $this->salary,
            'city_id' => $this->city_id,
            'email' => $this->email,
            'password' => $this->password,
            'city' =>  new CityResource($this->whenLoaded('city')),
//            'city' => $this->city->title,
        ];
    }
}
