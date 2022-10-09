<?php

declare(strict_types=1);

use Authentication\UserAuthentication;
use Html\WebPage;

require_once '../src/Html/WebPage.php';

// Création de l'authentification
$authentication = new UserAuthentication();

// Création de la page Web
$pageweb = new WebPage();

$pageweb->setTitle("Connexion");

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
                <a href="connexion.php">
                    <li><i class='bx bx-user'></i></li>
                </a>
            </div>
        </ul>
    </nav>

    <div class="container">
        <h2>Connexion</h2>
HTML
);

$form = $authentication->loginForm('profile.php');

$pageweb->appendContent(
    <<<HTML
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
                </ul>
            </li>
        </ul>
    </div>
HTML
);

echo $pageweb->toHTML();
