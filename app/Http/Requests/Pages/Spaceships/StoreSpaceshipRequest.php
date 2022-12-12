<?php

namespace App\Http\Requests\Pages\Spaceships;

use App\Http\Requests\Base;

class StoreSpaceshipRequest extends Base
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:5|max:64',
            'fuel' => 'required|min:5|max:64',
            'motor_power' => 'required|min:5|max:64',
            'quantity_weapon' => 'required|integer|min:0|max:100',
            'arquivo' => 'required|image|mimes:png|max:512',
        ];
    }
}
