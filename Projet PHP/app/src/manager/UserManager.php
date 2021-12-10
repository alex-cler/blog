<?php
namespace App\Manager;

use App\Entity\Personnage;
use App\Factory\PDOFactory;
use App\Fram\Interfaces\ConnectionInterface;
use App\Manager\BaseManager;


class UserManager extends BaseManager {

    public function getAllUsers(): array
    {
        $query = $this->pdo->query('SELECT * FROM ' . PDOFactory::DATABASE . '.users');
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'App\Entity\user');
        return $query->fetchAll();
    }

    public function getUserById(int $id): user
    {
        $query = $this->pdo->prepare('SELECT * FROM ' . PDOFactory::DATABASE . '.users' . ' ' . 'WHERE id = :id');
        $query->bindvalue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query-> setFetchMode(\PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Entity\user');
        return $query->fetch();
    }

    public function addUser(user $user): bool
    {
        $query = $this->pdo->prepare('INSERT INTO ' . PDOFactory::DATABASE . '.users (pseudo, email, password, admin) VALUES (:pseudo, :email, :password , :admin)');
        $query->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $query->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $query->bindValue('admin', $user->getAdmin(), PDO::PARAM_BOOL);
        return $query->execute();
    }

    public function updateUser(user $user): bool
    {
        $query = $this->pdo->prepare('UPDATE ' . PDOFactory::DATABASE . '.users SET pseudo = :pseudo, email = :email, password = :password, admin = :admin WHERE id = :id)');
        $query->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $query->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $query->bindValue('admin', $user->getAdmin(), PDO::PARAM_BOOL);
        $query->bindValue(':id', $user->getId(), PDO::PARAM_INT);
        return $query->execute();
    }

    public function deleteUser(int $id): bool
    {
        $query = $this->pdo->prepare('DELETE FROM ' . PDOFactory::DATABASE . '.users' . ' ' . 'WHERE id = :id');
        $query->bindvalue(':id', $id, \PDO::PARAM_INT);
        return $query->execute();
    }
}