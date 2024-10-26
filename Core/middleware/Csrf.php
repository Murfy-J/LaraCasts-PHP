<?php

declare(strict_types=1);

namespace Core\middleware;

use Core\User;
use Core\ValidationException;

class Csrf
{

    /**
     * @throws ValidationException
     */
    public function handle(): void
    {

        //Set the CSRF inputs
        $formToken = $_POST['csrf_token'] ?? null;
        $sessionToken = User::csrfToken();

        // Getting the old form data
        $attributes = $_POST;

        // If the token don't match throw exception and old data back to the form
        if (!User::checkCSRFToken($formToken, $sessionToken)) {

            ValidationException::throw([
                'csrfFailed' => 'Csrf validation failed'
            ], $attributes);

        }
    }


}
