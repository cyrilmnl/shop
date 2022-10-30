<?php

namespace Entity\Collection;

use Database\MyPdo;
use Entity\User;
use PDO;

class UserCollection
{
    public static function findAll(): array
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<'SQL'
            SELECT *
            FROM user
            ORDER BY lastName
        SQL
        );

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, User::class);

        return $stmt->fetchAll();
    }
}
