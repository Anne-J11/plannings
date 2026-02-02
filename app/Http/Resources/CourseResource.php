<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'planned_date' => $this->planned_date,
            'subject' => $this->whenLoaded('subject'),
            'classroom' => $this->whenLoaded('classroom'),
            'users' => UserResource::collection($this->whenLoaded('users')),
            'user_count' => $this->when(
                $this->relationLoaded('users'), 
                fn() => $this->users->count()
            ),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}