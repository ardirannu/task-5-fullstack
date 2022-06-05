<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    { 
        return [ 
            'data' => [
                'id' => $this->id,
                'category' => [
                    'id' => $this->category->id,
                    'name' => $this->category->name,
                ],
                'title' => $this->title,
                'desc' => $this->desc,
                'content' => $this->content,
                'author' => $this->author,
                'created_at' => $this->created_at->format('d/m/Y'),
                'updated_at' => $this->updated_at->format('d/m/Y'),
            ]
        ];
    }

    public function with($request)
    {
        return ['type' => 'success'];
    }
}
