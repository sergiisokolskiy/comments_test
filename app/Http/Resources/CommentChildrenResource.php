<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentChildrenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'post_id' => $this->post_id,
            'parent_id' => $this->parent_id,
            'published_at' => $this->published_at,
            'children' => CommentChildrenResource::collection($this->children),
        ];
    }
}
