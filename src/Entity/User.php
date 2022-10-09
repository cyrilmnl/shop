<?php

declare(strict_types=1);

namespace Entity;

use Database\MyPdo;
use Entity\Exception\EntityNotFoundException;
use Html\StringEscaper;
use PDO;

class User
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $birthdate;
    private string $phone;

    /**
     * @throws EntityNotFoundException
     */
    public static function findByCredentials(string $email, string $password): self
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<'SQL'
            SELECT id, lastName, firstName, phone, email, birthdate
            FROM user 
            WHERE email = :email
            AND sha512pass = :password
        SQL
        );

        $stmt->execute(["email" => $email, "password" => hash('sha512', $password)]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, User::class);
        $fetch = $stmt->fetch();
        if ($fetch == false) {
            throw new EntityNotFoundException("No data found");
        }
        return $fetch;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
}
