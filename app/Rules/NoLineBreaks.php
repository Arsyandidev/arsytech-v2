<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoLineBreaks implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (is_string($value) && preg_match('/[\r\n\x00]/', $value)) {
            $fail(':Attribute tidak boleh mengandung baris baru.');
        }
    }
}
