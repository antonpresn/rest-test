<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AuthorResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       //    return [
        //     'data' => $this->collection,
        //     'links' => [
        //         'self' => 'link-value',
        //     ],
        // ];
        return parent::toArray($request);
    }
}
