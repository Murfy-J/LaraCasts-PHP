<?php

namespace Http\Forms;


use Http\Forms\TestingForms\Form;

include '/Users/murfy/Desktop/WebDev/LaraCasts-PHP/Http/Forms/Form.php';

class Login extends Form

{
    // Define the rules for the login form
    public function validateLogin($fields)
    {
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:20']
        ];

        // Validate each field
        foreach ($fields as $field => $value) {
            if (isset($rules[$field])) {
                $this->validate($value, $rules[$field]);
            }
        }

        return empty($this->errors());
    }
}


// Instantiate the LoginForm class
$loginForm = new LoginForm;

// Define the fields to validate
$fields = [
    'email' => 'invalid-email',  // Invalid email for testing
    'password' => '2'     // Valid password
];

// Validate the login form
if ($loginForm->validateLogin($fields)) {
    echo "Login form validation passed!";
} else {
    print_r($loginForm->errors()); // Display error messages
}