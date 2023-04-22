<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {


        // return parent::toArray($request);


        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'status_id' => $this->status_id,
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'),
            'deleted_at' => $this->deleted_at->format('d-m-Y'),
        ];
    }
}