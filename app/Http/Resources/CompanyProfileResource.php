<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyProfileResource extends JsonResource
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
            'attributes' => [
                'basic_info' => [
                    'company_name' => $this->company_name,
                    'email' =>$this->email,
                    'phone_number' => $this->phone_number,
                    'website' => $this->website,
                    'est_since' => $this->est_since,
                    'team_size' => $this->team_size,
                    'category' => $this->category,
                    'allow_in_search' => $this->allow_in_serach,
                    'description' => $this->description,
                ],
                'social_networks' => [
                    'facebook' => $this->facebook,
                    'twitter' => $this->twitter,
                    'linkedin' => $this->linkedin,
                    'google_plus' => $this->google_plus,
                ],
                'contact_info' => [
                    'city' => $this->city,
                    'address' => $this->address,
                ],
            ],
            'relationships' => [
                'user_id' => $this->user_id,
            ]
        ];
    }
}
