<?php

declare(strict_types=1);

namespace Authentication;

use Authentication\Exception\AuthenticationException;
use Entity\Exception\EntityNotFoundException;
use Entity\User;
use Service\Exception\NotLoggedInException;
use Service\Exception\SessionException;
use Service\Session;

class UserAuthentication
{
    private const EMAIL_INPUT_NAME = 'email';
    private const PASSWORD_INPUT_NAME = 'password';
    public const SESSION_KEY = '__UserAuthentication__';
    public const SESSION_USER_KEY = 'user';
    private const LOGOUT_INPUT_NAME = 'logout';

    private ?User $user = null;

    /**
     * Constructeur de la classe UserAuthentication
     */
    public function __construct()
    {
        try {
            $this->user = $this->getUserFromSession();
        } catch (NotLoggedInException) {
        }
    }

    /**
     * Assesseur de l'iobjet User courant
     * @return User
     */
    public function getUser(): User
    {
        Session::start();
        if (isset($_SESSION[self::SESSION_KEY][self::SESSION_USER_KEY]) && $_SESSION[self::SESSION_KEY][self::SESSION_USER_KEY] instanceof User) {
            return $this->user;
        } else {
            throw new NotLoggedInException("Utilisateur inexistant");
        }
    }

    /**
     * @param User|null $user
     * @throws SessionException
     */
    public function setUser(?User $user): void
    {
        $this->user = $user;
        Session::start();
        $_SESSION[self::SESSION_KEY] = [self::SESSION_USER_KEY => $user];
    }

    public function loginForm(string $action, string $submitText = 'Connexion'): string
    {
        $email = self::EMAIL_INPUT_NAME;
        $password = self::PASSWORD_INPUT_NAME;

        return <<<HTML
                <form class="form" method="POST" action="$action">
                    <label>
                        Adresse mail<br>
                        <input type="$email" placeholder="Entrer votre adresse mail" name="$email" required>
                    </label>
                    
                    <label>
                        Mot de passe<br>
                        <input type="$password" placeholder="Entrer votre mot de passe" name="$password" required>
                    </label>
                    
                    <div class="buttons">
                        <button type="submit">$submitText</button>
                        <button type="reset">Effacer</button>
                    </div>

                    <p>Pas de encore de compte ? Inscrivez-vous <a href="inscription.php">ici</a>.</p>
                </form>
        HTML;
    }

    /**
     * @throws EntityNotFoundException
     * @throws SessionException
     * @throws NotLoggedInException
     */
    public function getUserFromAuth(): User
    {
        if (isset($_POST[self::EMAIL_INPUT_NAME]) && isset($_POST[self::PASSWORD_INPUT_NAME])) {
            $this->setUser(User::findByCredentials($_POST[self::EMAIL_INPUT_NAME], $_POST[self::PASSWORD_INPUT_NAME]));
            return User::findByCredentials($_POST[self::EMAIL_INPUT_NAME], $_POST[self::PASSWORD_INPUT_NAME]);
        } else {
            throw new NotLoggedInException('Utilisateur non trouvé');
        }
    }

    /**
     * @throws SessionException
     */
    public function isUserConnected(): bool
    {
        Session::start();
        if (isset($_SESSION[self::SESSION_KEY][self::SESSION_USER_KEY]) && $_SESSION[self::SESSION_KEY][self::SESSION_USER_KEY] instanceof User) {
            return true;
        } else {
            return false;
        }
    }

    public function logoutForm(string $action, string $text): string
    {
        $logout = self::LOGOUT_INPUT_NAME;

        return <<<HTML
                <form method="POST" action="$action">
                    <button name="$logout" type="submit">$text</button>
                </form>
        HTML;
    }

    public function logoutIfRequested(): void
    {
        $this->user = null;
        Session::start();
        if (isset($_POST[self::LOGOUT_INPUT_NAME])) {
            unset($_SESSION[self::SESSION_KEY][self::SESSION_USER_KEY]);
        }
    }

    /**
     * @throws NotLoggedInException|SessionException
     */
    protected function getUserFromSession(): User
    {
        Session::start();
        if (isset($_SESSION[self::SESSION_KEY][self::SESSION_USER_KEY]) && $_SESSION[self::SESSION_KEY][self::SESSION_USER_KEY] instanceof User) {
            return $_SESSION[self::SESSION_KEY][self::SESSION_USER_KEY];
        } else {
            throw new NotLoggedInException("Utilisateur non trouvé");
        }
    }
}
