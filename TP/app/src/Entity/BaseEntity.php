<?php
namespace App\Entity;

use App\Misc\Hydrator;

abstract class BaseEntity 
{
    use Hydrator;
    public function __construct(array $data = [])
    {
        $this->hydrate($data);
    }
}