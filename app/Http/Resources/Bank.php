<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Bank extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id'                =>      $this->id,
            'name'              =>      $this->name,
            'account'           =>      $this->account,
            'allowed_overdraft' =>      $this->allowed_overdraft,
            'bg_color'          =>      $this->bg_color,
            'font_color'        =>      $this->font_color,
            'show'              =>      $this->show
        ];
    }
}
