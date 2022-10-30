<?php

declare(strict_types=1);

use Html\WebPage;

require_once '../src/Html/WebPage.php';

$pageweb = new WebPage();

$pageweb->setTitle("Inscription");

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
        <h2>Inscription</h2>

        <form class="form" method="post" action="admin/user-form.php">
            <label>
                Nom<br>
                <input type="text" placeholder="Entrer votre nom de famille" name="lastname" required
                    pattern="[A-Za-z]+">
            </label>

            <label>
                Prénom<br>
                <input type="text" placeholder="Entrer votre prénom" name="firstname" required pattern="[A-Za-z]+">
            </label>

            <label>
                Adresse mail<br>
                <input type="email" placeholder="Entrer votre adresse mail" name="email" required>
            </label>

            <label>
                Mot de passe<br>
                <input type="password" placeholder="Entrer votre mot de passe" name="password" required>
            </label>

            <label>
                Date de naissance
                <input type="date" name="birthdate" required>
            </label>
            
            <label>
                Numéro de téléphone
                <input type="tel" placeholder="Entrer votre numéro de téléphone" name="phone" required>
            </label>

            <div class="buttons">
                <button type="submit">Inscription</button>
                <button type="reset">Effacer</button>
            </div>

            <p>Déjà un compte ? Connectez-vous <a href="connexion.php">ici</a>.</p>
        </form>
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
