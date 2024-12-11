<?php
require_once '/var/www/html/autoload.php'; // Chemin absolu vers autoload.php

use App\Core\User;

$user = new User();
$user->initializeSession();

// Si l'utilisateur veut se déconnecter
if (isset($_GET['logout'])) {
    $user->logout();
    header('Location: /');  // Redirection vers localhost (page principale)
    exit;
}

// Vérifier si l'utilisateur est connecté
if (!$user->isLogged()) {
    header('Location: /');  // Redirige vers la page d'accueil si l'utilisateur n'est pas connecté
    exit;
}

// Affichage du contenu pour l'utilisateur connecté
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
</head>
<body>
    <h1>Bienvenue sur votre tableau de bord</h1>
    <p>Bonjour, <?= $_SESSION['user']['name'] ?> !</p>
    
    <!-- Lien pour se déconnecter -->
    <a href="?logout=true">Se déconnecter</a>
</body>
</html>