<?php

namespace App\Http\Resources;

use App\Models\Board;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Board
 */
class BoardResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
