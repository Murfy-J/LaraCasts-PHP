<?php

declare(strict_types=1);

use Core\Session;

$heading = "Create New Note";

view('notes/create.view.php', [
    'heading' => $heading,
    'errors' => Session::get('errors')
]);
