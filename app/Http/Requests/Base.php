<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

abstract class Base extends FormRequest
{
    /**
     * @param Validator $validator
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->getMessageBag()->toArray();

        foreach($errors as $input => $errorsInput) {

            $errorMessage = implode(' ', $errorsInput);

            Controller::createToast('error', $errorMessage, 'Input: ' . $input);
        }

        throw ValidationException::withMessages([])
            ->redirectTo($this->getRedirectUrl());
    }
}
