<?php


class Form
{
    protected $errors = [];

    // Validate the fields against the rules
    public function validate($fields, $rules)
    {
        foreach ($fields as $field => $value) {
            // Get the rules for the specific field
            $fieldRules = explode('|', $rules[$field]);  // Split rules by '|'

            // Loop through each rule
            foreach ($fieldRules as $rule) {
                // Check if the rule contains a parameter (e.g., min:8 or max:12)
                if (strpos($rule, ':') !== false) {
                    // Split the rule and its parameter
                    [$ruleName, $param] = explode(':', $rule);

                    // Call the validation method with the parameter
                    if (!call_user_func([$this, $ruleName], $value, $param)) {
                        $this->errors[$field][] = "Invalid value for $field: $ruleName $param rule failed.";
                    }
                } else {
                    // Call the validation method without a parameter
                    if (!call_user_func([$this, $rule], $value)) {
                        $this->errors[$field][] = "Invalid value for $field: $rule rule failed.";
                    }
                }
            }
        }

        return empty($this->errors);
    }

    // Display errors
    public function errors()
    {
        return $this->errors;
    }

    // Validation methods
    protected function required($value)
    {
        return !empty($value);
    }

    protected function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    protected function min($value, $min)
    {
        return strlen($value) >= $min;
    }

    protected function max($value, $max)
    {
        return strlen($value) <= $max;
    }
}

// Usage example
$fields = [
    'name' => '',
    'email' => 'john@example.com',
    'password' => 'pass1234'
];

$rules = [
    'name' => 'required|min:10',
    'email' => 'required|email',
    'password' => 'required|min:8|max:12'
];

$form = new Form;

if ($form->validate($fields, $rules)) {
    echo "Validation passed!";
} else {
    print_r($form->errors());
}



//$fields = [
//    'name' => 'John',
//    'email' => 'john@example.com',
//    'phone' => '2343423434234'
//];
//
//$rules = [
//    'name' => [1, 2, 6,],
//    'email' => [1, 2, 3, 4, 5, 6, 6,],
//    'phone' => [1, 2, 3, 4, 5, 6, 6,]
//];
//
//foreach ($fields as $field => $value) {
//    echo "Field: " . $field . "<br>";
//
//    // Get the rules for the specific field
//    $fieldRules = $rules[$field];
//
//    foreach ($fieldRules as $rule) {
//        echo "Rule for {$field}: " . $rule . "<br><br>";
//    }
//}
