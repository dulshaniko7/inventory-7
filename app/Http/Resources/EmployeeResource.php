<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'name'=> $this->name,
            'nic' => $this->nic,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'salary' => $this->salary,

            'photo' => $this->photo,
            'joiningDate' => $this->joiningDate,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
