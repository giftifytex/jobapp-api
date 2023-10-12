<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'description' => $this->description,
                'pay' => $this->pay,
                'is_popular' => $this->is_popular,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,

            ],
            'relationships' => [
                'job_type' => $this->job_type_id,
                'location' => $this->location,
                'category' => $this->category_id,
            ],
        ];
    }
}
