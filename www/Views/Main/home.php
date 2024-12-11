<?php if($user->isLogged()): ?>
    Bienvenue <?= $user->getFirstname() ?>
<?php else: ?>
    Bienvenue sur mon site
<?php endif; ?>