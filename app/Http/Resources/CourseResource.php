<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'planned_date' => $this->planned_date,
            'subject_id' => $this->subject_id,
            'classroom_id' => $this->classroom_id,
            'users' => UserResource::collection($this->whenLoaded('users')),
            'user_count' => $this->when($this->users->count() > 0, 
            $this->users->count())
        ]
    }
}
