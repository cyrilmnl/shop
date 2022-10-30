<?php

use Entity\Exception\ParameterException;
use Entity\User;

try {
    if (isset($_GET["userId"])) {
        if (ctype_digit($_GET["userId"]) == false) {
            throw new ParameterException("No data found");
        } else {
            $userId = (int)$_GET["userId"];
        }
    } else {
        $userId = null;
    }

    $user = User::findById(($userId));
    $user->delete();
    header("Location: ../index.php");

} catch (ParameterException) {
    http_response_code(400);
} catch (Exception) {
    http_response_code(500);
}
