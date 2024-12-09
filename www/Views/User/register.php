<?php

$countryList = [
    [
        "code" => "fr",
        "name" => "France"
    ],
    [
        "code" => "es",
        "name" => "Espagne"
    ],
    [
        "code" => "de",
        "name" => "Allemagne"
    ]
]

?>

<style>
    .error {
        color: red;
    }
</style>

<form action="" method="post">
    <div>
        <label for="firstname">Prénom :</label>
        <input type="text" id="firstname" name="firstname" value="<?= $credentials['firstname'] ?>">
        <?php if(isset($error["firstname"])): ?>
            <p class="error">
                <?= $error["firstname"] ?>
            </p>
        <?php endif; ?>
    </div>
    <div>
        <label for="lastname">Nom :</label>
        <input type="text" id="lastname" name="lastname" value="<?= $credentials['lastname'] ?>">
        <?php if(isset($error["lastname"])): ?>
            <p class="error">
                <?= $error["lastname"] ?>
            </p>
        <?php endif; ?>
    </div>
    <div>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?= $credentials['email'] ?>">
        <?php if(isset($error["email"])): ?>
            <p class="error">
                <?= $error["email"] ?>
            </p>
        <?php endif; ?>
    </div>
    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password">
        <?php if(isset($error["password"])): ?>
            <p class="error">
                <?= $error["password"] ?>
            </p>
        <?php endif; ?>
    </div>
    <div>
        <label for="passwordConfirm">Confirmer le mot de passe :</label>
        <input type="password" id="passwordConfirm" name="passwordConfirm">
        <?php if(isset($error["passwordConfirm"])): ?>
            <p class="error">
                <?= $error["passwordConfirm"] ?>
            </p>
        <?php endif; ?>
    </div>
    <div>
        <label for="country">Pays : </label>
        <select name="country" id="country">
            <option value="0" hidden>Sélectionner un pays</option>
            <?php foreach($countryList as $c): ?>
                <option 
                    value="<?= $c["code"] ?>" 
                    <?= $credentials["country"] == $c["code"] ? "selected" : "" ?>
                >
                    <?= $c["name"] ?>
                </option>
            <?php endforeach; ?>    
        </select>
        <?php if(isset($error["country"])): ?>
            <p class="error">
                <?= $error["country"] ?>
            </p>
        <?php endif; ?>
    </div>
    <input type="submit" name="submit" value="S'inscrire">
</form>