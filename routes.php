<?php

declare(strict_types=1);

$router->get('/', '/index.php');
$router->get('/about', '/about.php');
$router->get('/contact', '/contact.php');


$router->get('/note', '/notes/show.php')->only('auth');;
$router->get('/notes', '/notes/index.php')->only('auth');
$router->delete('/note', '/notes/destroy.php')->only('auth');;

$router->get('/note/edit', '/notes/edit.php')->only('auth');;
$router->patch('/note', '/notes/update.php')->only('auth');;


$router->get('/notes/create', '/notes/create.php')->only('auth');;
$router->post('/notes', '/notes/store.php')->only('csrf');

$router->get('/register', '/registration/create.php')->only('guest');
$router->post('/register', '/registration/store.php');

$router->get('/login', '/session/create.php')->only('guest');
$router->post('/session', '/session/store.php')->only('csrf');
$router->delete('/session', '/session/destroy.php');
//require 'notesRoutes.php';




