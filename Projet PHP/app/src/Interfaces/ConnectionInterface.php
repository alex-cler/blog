<?php

namespace App\Interfaces;

interface ConnectionInterface
{
    public function getConnection(): \PDO;
}