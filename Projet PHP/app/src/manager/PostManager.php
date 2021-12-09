<?php

namespace App\Manager;

use App\Manager\BaseManager;
use App\Factory\PDOFactory;
use App\Entity\Post;


class PostManager extends BaseManager
{
    public function getAllPosts(): array
    {
        $query = $this->pdo->query('SELECT * FROM ' . PDOFactory::DATABASE . '.posts');
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_CLASS,'App\Entity\Post');
    }

    /* public function getPostById(int $id)
     {
         $query = $this->pdo->prepare('SELECT * FROM posts WHERE id = :id');
         $query->execute(array('id'=>$id));
         $query->fetch(PDO::FETCH_OBJ);
       /*SELECT * FROM `posts` WHERE id=1;
         $query = $this->pdo->prepare('SELECT * FROM' . PDOFactory::DATABASE . '.posts' . ' ' . 'WHERE id = :id');
         $query->bindvalue(':id', $id, \PDO::PARAM_INT);
         $query->execute();
         $query-> setFetchMode(\PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Entity\Post');
         return $query->fetch();
         */


        /*$query = 'SELECT * FROM ' . PDOFactory::DATABASE . '.posts WHERE id = :id';
        $select = $this->pdo->prepare($query);
        $select->bindValue(':id', $id, \PDO::PARAM_INT);
        $select->execute();

        $result = $select->fetch(\PDO::FETCH_ASSOC);

        return $query;
    }*/

    public function deletePost(int $id): bool
    {
        $query = $this->pdo->prepare('DELETE FROM' . PDOFactory::DATABASE . '.posts' . ' ' . 'WHERE id = :id');
        $query->bindvalue(':id', $id, \PDO::PARAM_INT);
        return $query->execute();
    }


    public function createPost(Post $post): bool
    {
        $query = $this->pdo->prepare('INSERT INTO' . PDOFactory::DATABASE . '.posts (title, content, publish_date, userId) VALUES (:title, :content, :publish_date, :userId)');
        $query->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $query->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $query->bindValue(':pubish_date', date('Y/m/d H:i:s'), PDO::PARAM_STR);
        $query->bindValue(':userID', $post->getUserId(), PDO::PARAM_INT);
        return $query->execute();
    }


    public function editPost(Post $post): bool
    {
        $query = $this->pdo->prepare('UPDATE' . PDOFactory::DATABASE . '.posts SET title = :title, content = :content, userId = :userId WHERE id = :id)');
        $query->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $query->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $query->bindValue(':userID', $post->getUserId(), PDO::PARAM_INT);
        $query->bindValue(':id', $post->getId(), PDO::PARAM_INT);
        return $query->execute();
    }
}
    


