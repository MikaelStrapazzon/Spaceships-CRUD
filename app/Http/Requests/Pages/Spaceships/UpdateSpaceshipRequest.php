<?php

namespace App\Http\Requests\Pages\Spaceships;

use App\Http\Requests\Base;

class UpdateSpaceshipRequest extends Base
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'min:5|max:64',
            'fuel' => 'min:5|max:64',
            'motor_power' => 'min:5|max:64',
            'quantity_weapon' => 'integer|min:0|max:100',
            'arquivo' => 'image|mimes:png|max:512',
        ];
    }
}
