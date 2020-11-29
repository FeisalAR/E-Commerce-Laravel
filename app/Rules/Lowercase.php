<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Lowercase implements Rule
{

    public function passes($attribute, $value)
    {
        return strtolower($value) === $value;
    }

    /**
     * @return string
     */
    public function message()
    {
        return ':attribute hanya boleh menggunakan huruf kecil';
    }
}
