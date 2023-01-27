<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'birth_date' => $this->birth_date,
            'salary' => $this->salary,
            'salary_day' => $this->salary_day,
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
