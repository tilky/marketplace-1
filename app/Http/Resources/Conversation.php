<?php

namespace App\Http\Resources;

use App\Message;
use Illuminate\Http\Resources\Json\Resource;

class Conversation extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        /** @var Message|Conversation $this */
        return [
            'id' => $this->id,
            'content' => $this->content,
            'additional' => MessageAdditional::make($this->resource->additional),
            'user' => User::make($this->user),
            'from' => User::make($this->from),
            'read' => $this->read
        ];
    }
}
