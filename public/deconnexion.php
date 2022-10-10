<?php

declare(strict_types=1);

use Authentication\UserAuthentication;
use Service\Exception\NotLoggedInException;

$authentication = new UserAuthentication();

try {
    $user = $authentication->getUser();
    if (isset($_POST['logout'])) {
        $authentication->logoutIfRequested();
        header('Location: /profile.php');
    }
} catch (NotLoggedInException $e) {
    header('Location: /connexion.php');
}
