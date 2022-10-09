<?php

declare(strict_types=1);

use Authentication\UserAuthentication;
use Html\WebPage;

$authentication = new UserAuthentication();

// Un utilisateur est-il connecte ?
if (!$authentication->isUserConnected()) {
    // Rediriger vers le formulaire de connexion
    header('Location: /form.php');
    die(); // Fin du programme
}

$title = 'Affichage utilisateur connecté';
$p = new WebPage($title);

$p->appendContent(
    <<<HTML
        <h1>Utilisateur authentifié</h1>
        <h2>{$authentication->getUser()->getFirstName()} est connecté</h2>
HTML
);

echo $p->toHTML();
