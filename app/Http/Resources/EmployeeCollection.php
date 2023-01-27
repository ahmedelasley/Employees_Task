<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EmployeeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => EmployeeResource::collection($this->collection),
        ];
    }

    public function paginationInformat($request)
    {
        $paginated = $this->resource->toArray();

        return [
            'current_page'  => $paginated['current_page'],
            'per_page'      => $paginated['per_page'],
            'total'         => $paginated['total'],
            'total_page'    => $paginated['total_page'],
        ];
    }
}
