<?php

declare(strict_types=1);

use Entity\Collection\UserCollection;
use Html\WebPage;

$pageweb = new WebPage();

$pageweb->setTitle("Utilisateurs");

$pageweb->appendCssUrl("../css/style.css");

$pageweb->appendCssUrl("https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css");

$pageweb->appendContent(
    <<<HTML
    <nav class="nav__bar">
        <ul>
            <a href="../index.php">
                <li>Accueil</li>
            </a>
        </ul>
    </nav>
    
    <nav class="nav__bar2">
        <ul>
            <a href="index.php">
                <li>Accueil administrateur</li>
            </a>
            
            <a href="users.php">
                <li>Utilisateurs</li>
            </a>
        </ul>
    </nav>

    <div class="container">
        <h2>Utilisateurs (fonctionnalité administrateur)</h2>

        <div class="users">
HTML
);

foreach (UserCollection::findAll() as $user) {
    $pageweb->appendContent(
        <<<HTML
                            <p>{$user->getLastName()} {$user->getFirstName()} ({$user->getEmail()})</p>
                            
                            <form action="user-delete.php">
                                <button type="submit" name="userId" value="{$user->getId()}">
                                    Supprimer l'utilisateur <span class="user">{$user->getLastName()} 
                                    {$user->getFirstName()}</span>
                                </button>
                            </form>
HTML
    );
}

$pageweb->appendContent(
    <<<HTML
        </div>
    </div>
    
    <footer>
        Ce(tte) œuvre est mise à disposition selon les termes de la <a rel="license"
            href="http://creativecommons.org/licenses/by/4.0/">Licence Creative Commons Attribution 4.0
            International</a>
    </footer>
HTML
);

echo $pageweb->toHTML();
