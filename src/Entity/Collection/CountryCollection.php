<?php

declare(strict_types=1);

namespace Entity\Collection;

use Database\MyPdo;

class CountryCollection
{
    public static function findall()
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<'SQL'
               SELECT id, code, name
            FROM country
            ORDER BY id
        SQL
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Entity\Country");
    }
}
