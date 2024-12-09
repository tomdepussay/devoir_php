<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? "Titre de page" ?></title>
    <meta name="description" content="<?= $description??"ceci est la description de ma page" ?>">
</head>
<body>
    <h1>Mon site</h1>

    <nav>
        <ul>
            <li>
                <a href="/">Accueil</a>
            </li>
            <li>
                <a href="register">Inscription</a>
            </li>
            <li>
                <a href="login">Connexion</a>
            </li>
            <li>
                <a href="logout">Déconnexion</a>
            </li>
        </ul>
    </nav>

    <?php include "../Views/".$this->v; ?>
</body>
</html>