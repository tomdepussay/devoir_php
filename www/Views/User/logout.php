<?php
require_once '/var/www/html/autoload.php';

use App\Core\User;

$user = new User();
$user->initializeSession();
$user->logout();

header('Location: /Views/User/login.php');
exit;