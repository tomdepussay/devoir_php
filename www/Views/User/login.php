<?php
require_once '/var/www/html/autoload.php'; // Chemin absolu vers autoload.php

use App\Core\User;
use App\Core\SQL;

$user = new User();
$user->initializeSession();
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validation simple des champs
    if (empty($email) || empty($password)) {
        $error = 'Tous les champs doivent être remplis.';
    } else {
        // Utiliser la classe SQL pour récupérer l'utilisateur par email
        $sql = new SQL();
        $userData = $sql->getUserByEmail($email);

        if ($userData && password_verify($password, $userData['password'])) {
            // Login réussi, on enregistre les données dans la session
            $user->login([
                'email' => $userData['email'],
                'name' => $userData['firstname'] . ' ' . $userData['lastname']
            ]);
            header('Location: /Views/User/dashboard.php');
            exit;
        } else {
            $error = 'Identifiants incorrects.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form action="" method="post">
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Se connecter</button>
    </form>
    <?php if ($error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</body>
</html>