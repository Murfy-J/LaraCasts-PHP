<?php

declare(strict_types=1);


namespace Core;

use PDO;
use PDOStatement;

class Database
{
    public PDO $connection;

    public PDOStatement $statement;

    public function __construct(array $config, string $username = 'root', string $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query(string $query, array $params = []): static
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function find(): false|array
    {
        return $this->statement->fetch();
    }

    public function get(): false|array
    {
        return $this->statement->fetchAll();
    }

    public function findOrFail(): false|array
    {
        $result = $this->find();

        if (!$result) {
//            dd('We failed to find the record!');

            abort();
        }

        return $result;
    }
}
