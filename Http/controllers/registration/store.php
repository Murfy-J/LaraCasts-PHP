<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Http\Forms\RegistrationForm;


$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmpassword'];

$form = RegistrationForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'confirmpassword' => $_POST['confirmpassword']
]);

$db = App::resolve(Database::class);

// check if the user email address already exists
$checkUserExists = $db->query("SELECT * FROM users WHERE email = :email", [
    ':email' => $email
])->find();


// If yes redirect to login form with email
if ($checkUserExists) {
    return redirect('/login');
    exit;
}

$saveNewUser = $db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
    ':email' => $email,
    ':password' => password_hash($password, PASSWORD_DEFAULT),
]);

if ($saveNewUser) {

    (new Authenticator)->login([
        'email' => $email,
    ]);

    return redirect('/');
}


