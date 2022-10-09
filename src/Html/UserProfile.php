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
        $phone = self::escapeString($this->user->getPhone());
        $email = self::escapeString($this->user->getEmail());
        $birthdate = self::escapeString($this->user->getBirthdate());

        return <<<HTML
                <p>Nom : {$lastName}</p>

                <p>Prénom : {$firstName}</p>

                <p>Téléphone : {$phone}</p>

                <p>Email : {$email}</p>

                <p>Date de naissance : {$birthdate}</p>
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
