<?php

namespace Core;

class User
{
    protected $userID;
    protected $userEmail;

// Constructor to initialize user from session data
    public function __construct()
    {
        if (isset($_SESSION['user'])) {
// Initialize object properties from session data
            $this->userID = $_SESSION['user']['currentUserId'];
            $this->userEmail = $_SESSION['user']['email'];
        }
    }

// Getter methods for user properties
    public static function getUserID()
    {
        $instance = new static;
        return $instance->userID;
    }

    public function getUserEmail()
    {
        return $this->userEmail;
    }

    public function getUserData()
    {
        return [
            'userID' => $this->userID,
            'userEmail' => $this->userEmail
        ];
    }

    public static function csrfToken()
    {
        if (empty($_SESSION['csrf_token'])) {
            return $_SESSION['csrf_token'] = bin2hex(random_bytes(32));  // Create a 32-byte random token
        } else {
            return $_SESSION['csrf_token'];
        }
    }

    public static function checkCSRFToken($formToken, $sessionToken)
    {
        return $formToken === $sessionToken;
    }
}
