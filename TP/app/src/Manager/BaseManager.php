<?php

namespace App\Manager;

use App\Interfaces\ConnectionInterface;

abstract class BaseManager {
    protected \PDO $pdo;
    public function __construct(ConnectionInterface $pdo)
    {
        $this->pdo = $pdo->getConnection();
    }
}