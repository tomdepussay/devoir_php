<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\User;

class Main
{

    public function home():void
    {
        $view = new View("Main/home.php");
    }

}