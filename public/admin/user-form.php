<?php

declare(strict_types=1);

use Entity\Exception\EntityNotFoundException;
use Entity\Exception\ParameterException;
use Entity\User;

try {
    if (isset($_POST['lastname'])) {
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $birthdate = $_POST['birthdate'];
        $phone = $_POST['phone'];

        $newUser = User::create($firstname, $lastname, $email, $birthdate, $phone);

        $newUser->insert($firstname, $lastname, $email, $password, $birthdate, $phone);
    }

    header("Location: ../index.php");
} catch (ParameterException) {
    http_response_code(400);
} catch (EntityNotFoundException) {
    http_response_code(404);
} catch (Exception) {
    http_response_code(500);
}
