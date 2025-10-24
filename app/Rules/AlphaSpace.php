<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AlphaSpace implements ValidationRule {

    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void {

        if (!preg_match('/^[A-Za-z_\s\-]+$/', $value)) {
            $fail("The :attribute should contain only letters and spaces.");
        }
    }
}
