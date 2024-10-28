<?php

use Core\Authenticator as Auth;
use Http\Forms\RegistrationForm;
use Http\Models\UserModel;

$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmpassword'];

$form = RegistrationForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'confirmpassword' => $_POST['confirmpassword']
]);

$user = new UserModel();

if ($user->findByEmail($email) === true) {
    redirect('/login');
    exit;
}

$createUser = $user->createUser([
    'email' => $email,
    'password' => $password
]);

if ($createUser) {
    Auth::login($createUser);
    exit;
}


