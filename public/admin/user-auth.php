<?php

declare(strict_types=1);

use Authentication\UserAuthentication;
use Entity\Exception\EntityNotFoundException;
use Service\Exception\NotLoggedInException;
use Service\Exception\SessionException;
use Service\Session;

$authentication = new UserAuthentication();

try {
    $authentication->getUserFromAuth();
    header('Location: ../profile.php');
} catch (EntityNotFoundException|NotLoggedInException|SessionException $e) {
    Session::start();
    $_SESSION['invalid_login'] = 'invalid_login';
    header('Location: ../connexion.php');
}
