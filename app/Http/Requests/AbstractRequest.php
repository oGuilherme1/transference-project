<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Hyperf\Contract\ValidatorInterface;
use Hyperf\Validation\Request\FormRequest;
use Hypervel\HttpMessage\Exceptions\HttpResponseException;


class AbstractRequest extends FormRequest
{
    protected function failedValidation(ValidatorInterface $validator)
    {
        $errors = $validator->errors();
        
        throw new HttpResponseException(
            response()->json([
                'errors' => $errors
            ], 422)
        );
    }
}