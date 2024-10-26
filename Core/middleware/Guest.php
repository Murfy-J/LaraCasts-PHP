<?php

namespace Core\middleware;

class Guest
{
    public function handle()
    {
        //Updated
        if ($_SESSION['user'] ?? false) {
            header('location: /');
            exit();
        }
    }
}