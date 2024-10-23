<?php

namespace Http\Forms\TestingForms;
class Form
{
    protected array $errors = [];

    // Validate a single input against an array of rules
    public function validate($input, $rules): bool
    {
        foreach ($rules as $rule) {
            // Check if the rule has a parameter (e.g., min:9 or max:10)
            if (str_contains($rule, ':')) {
                [$ruleName, $param] = explode(':', $rule);

                // Call the validation method with the parameter
                if (!call_user_func([$this, $ruleName], $input, $param)) {
                    $this->error("$ruleName:$param validation failed.");
                }
            } else {
                // Call the validation method without a parameter
                if (!call_user_func([$this, $rule], $input)) {
                    $this->error("$rule validation failed.");
                }
            }
        }

        return empty($this->errors);
    }

    // Method to set error messages
    public function error($message): void
    {
        $this->errors[] = $message;
    }

    // Method to retrieve errors
    public function errors(): array
    {
        return $this->errors;
    }

    // Validation methods
    protected function required($value): bool
    {
        return !empty($value);
    }

    protected function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    protected function min($value, $min): bool
    {
        return strlen($value) >= $min;
    }

    protected function max($value, $max): bool
    {
        return strlen($value) <= $max;
    }
}
