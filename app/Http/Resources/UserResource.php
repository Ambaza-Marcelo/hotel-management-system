<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
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
            'id' => $this->id,
            'name' => $this->name,
            'role' => $this->role,
            'email' => $this->email,
            'address' => $this->address,
            'about' => $this->about,
            'pic_path' => (!empty($this->pic_path))?$this->pic_path:null,
            'phone_number' => $this->phone_number,
            'hotel_code' => $this->code,
            'hotel' => new HotelResource(\App\Hotel::where('code',$this->code)->first()),
        ];
    }
}
