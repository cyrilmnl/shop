<?php

declare(strict_types=1);

namespace Service;

use Service\Exception\SessionException;

class Session
{
    /**
     * Méthode permettant de démarrer la session, uniquement lorsque cela est nécessaire.
     */
    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            if (headers_sent()) {
                throw new SessionException("Impossible de modifier les entêtes HTTP");
            }
            session_start();
        } elseif (session_status() === PHP_SESSION_DISABLED) {
            throw new SessionException("Session désactivée");
        } elseif (session_status() !== PHP_SESSION_ACTIVE) {
            throw new SessionException("Exception inconnue");
        }
    }
}
