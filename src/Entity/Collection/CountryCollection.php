<?php

declare(strict_types=1);

namespace Entity\Collection;

use Database\MyPdo;
use PDO;

class CountryCollection
{
    public static function findAll(): array
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<'SQL'
               SELECT id, code, name
            FROM country
            ORDER BY name
        SQL
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Entity\Country");
    }
}
