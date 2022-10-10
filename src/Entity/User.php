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

    public static function create(int $id, string $firstname, string $lastname, string $email, string $birthdate, ?string $phone = null): self
    {
        $user = new User();
        $user->setId($id);
        $user->setFirstName($firstname);
        $user->setLastName($lastname);
        $user->setEmail($email);
        $user->setBirthdate($birthdate);
        $user->setPhone($phone);
        return $user;
    }

    public function insert(int $id, string $firstname, string $lastname, string $email, string $password, string $birthdate, ?string $phone = null): self
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<'SQL'
            INSERT INTO user (id, firstname, lastname, email, sha512pass, birthdate, phone)
            VALUES(:id, :firstname, :lastname, :email, :password, :birthdate, :phone)
        SQL
        );

        $stmt->execute(["id" => $id, "firstname" => $firstname, "lastname" => $lastname, "email" => $email,
            "password" => hash('sha512', $password), "birthdate" => $birthdate, "phone" => $phone,]);
        $this->setId((int)MYPDO::getInstance()->lastInsertId());
        return $this;

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

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $birthdate
     */
    public function setBirthdate(string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
}
