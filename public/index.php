<?php

declare(strict_types=1);

use Html\WebPage;

require_once '../src/Html/WebPage.php';

// Création de la page Web
$pageweb = new WebPage();

$pageweb->setTitle("Accueil");

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

    <nav class="nav__bar2">
        <ul>
            <li>Hommes</li>
            <li>Femmes</li>
            <li>Accessoires</li>
        </ul>
    </nav>

    <div class="container">
        <h2>Bienvenue sur notre boutique</h2>

        <section class="section1">
            <h4><i class='bx bx-news'></i> Découvrez les nouveautés</h4>

            <ul class="content">
                <li class="content__item">
                    <img src="img/t-shirt_man.png" alt="t-shirt_man">
                    <label class="product__name">T-shirt blanc classique - 15€</label>
                </li>

                <li class="content__item">
                    <img src="img/t-shirt_man.png" alt="t-shirt_man">
                    <label class="product__name">T-shirt blanc classique - 15€</label>
                </li>

                <li class="content__item">
                    <img src="img/t-shirt_man.png" alt="t-shirt_man">
                    <label class="product__name">T-shirt blanc classique - 15€</label>
                </li>

                <li class="content__item">
                    <img src="img/t-shirt_man.png" alt="t-shirt_man">
                    <label class="product__name">T-shirt blanc classique - 15€</label>
                </li>
            </ul>
        </section>

        <section class="section2">
            <h4><i class='bx bx-medal'></i> L'article du jour</h4>

            <li class="item">
                <img src="img/t-shirt_man.png" alt="t-shirt_man">
                <label class="product__name">T-shirt blanc classique - 15€</label>
            </li>
        </section>

        <section class="section1">
            <h4><i class='bx bx-cloud-snow'></i> Sélection automne-hiver 2022</h4>

            <ul class="content">
                <li class="content__item">
                    <img src="img/t-shirt_man.png" alt="t-shirt_man">
                    <label class="product__name">T-shirt blanc classique - 15€</label>
                </li>

                <li class="content__item">
                    <img src="img/t-shirt_man.png" alt="t-shirt_man">
                    <label class="product__name">T-shirt blanc classique - 15€</label>
                </li>

                <li class="content__item">
                    <img src="img/t-shirt_man.png" alt="t-shirt_man">
                    <label class="product__name">T-shirt blanc classique - 15€</label>
                </li>

                <li class="content__item">
                    <img src="img/t-shirt_man.png" alt="t-shirt_man">
                    <label class="product__name">T-shirt blanc classique - 15€</label>
                </li>
            </ul>
        </section>
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
