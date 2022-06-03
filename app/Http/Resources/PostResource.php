<?php

namespace App\Http\Resources;

use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Post
 */
class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'created' => $this->created_at?->format('d.m.Y H:i:s'),
            'board' => BoardResource::make($this->board),
            'content' => $this->content
        ];
    }
}
