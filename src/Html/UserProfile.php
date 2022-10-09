<?php

declare(strict_types=1);

namespace Html;

use Entity\User;

class UserProfile
{
    use StringEscaper;

    private User $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function toHtml(): string
    {
        $lastName = self::escapeString($this->user->getLastName());
        $firstName = self::escapeString($this->user->getFirstName());
        $login = self::escapeString($this->user->getLogin());
        $phone = self::escapeString($this->user->getPhone());

        return <<<HTML
                <p>Nom : {$lastName}</p>

                <p>Prénom : {$firstName}</p>

                <p>Login : {$login}[{$this->user->getId()}]</p>

                <p>Téléphone : {$phone}</p>
        HTML;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
