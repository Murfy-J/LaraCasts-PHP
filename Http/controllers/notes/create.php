<?php

declare(strict_types=1);

$heading = "Create New Note";

view('notes/create.view.php', [
    'heading' => $heading,
    'errors' => []
]);
