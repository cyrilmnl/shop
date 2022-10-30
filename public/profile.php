<?php

declare(strict_types=1);

use Authentication\UserAuthentication;
use Html\WebPage;
use Service\Exception\NotLoggedInException;

require_once '../src/Html/WebPage.php';

$authentication = new UserAuthentication();

try {
    $user = $authentication->getUser();
    $form = $authentication->logoutForm('admin/user-logout.php', 'Déconnexion');
} catch (NotLoggedInException $e) {
    header('Location: /connexion.php');
}

$pageweb = new WebPage();

$pageweb->setTitle("Profil");

$pageweb->appendCssUrl("css/style.css");

$pageweb->appendCssUrl("https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css");

$pageweb->appendContent(
    <<<HTML
        <nav class="nav__bar">
        <ul>
            <a href="index.php">
                <li>Accueil</li>
            </a>
            <div class="icons">
                <li><i class='bx bx-basket'></i></li>
                <li><i class='bx bx-heart'></i></li>
                <a href="profile.php">
                    <li><i class='bx bx-user'></i></li>
                </a>
            </div>
        </ul>
    </nav>

    <div class="container">
HTML
);

$pageweb->appendContent(
    <<<HTML
        <h2>Bonjour {$user->getFirstName()}</h2>
        
        {$form}
    </div>

    <footer>
        Ce(tte) œuvre est mise à disposition selon les termes de la <a rel="license"
            href="http://creativecommons.org/licenses/by/4.0/">Licence Creative Commons Attribution 4.0
            International</a>
    </footer>

    <div class="informations">
        <ul>
            <li>
                Nous contacter
                <ul>
                    <li>Nos coordonnées</li>
                </ul>
            </li>

            <li>
                Aide et informations
                <ul>
                    <li>Assistance</li>
                    <li>Suivi commande</li>
                    <li>Livraison et retour</li>
                </ul>
            </li>

            <li>
                A propos
                <ul>
                    <li>Confidentialité</li>
                    <li>Cookies</li>
                    <li>Conditions générales</li>
                    <a href="admin/index.php">
                        <li>Administration</li>
                    </a>
                </ul>
            </li>
        </ul>
    </div>
HTML
);

echo $pageweb->toHTML();
