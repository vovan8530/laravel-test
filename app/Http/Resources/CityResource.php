<?php

namespace App\Http\Resources;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{

    public function toArray(Request $request): array
    /**@var City $this  */
    {
        return [
            'title' => $this->title,
        ];
    }
}
