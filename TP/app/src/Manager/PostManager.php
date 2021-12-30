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

    public function getPostById(int $id)
     {/*
         $query = $this->pdo->prepare('SELECT * FROM posts WHERE id = :id');
         $query->execute(array('id'=>$id));
         $query->fetch(PDO::FETCH_OBJ);
         */
         $query = $this->pdo->prepare('SELECT * FROM ' . PDOFactory::DATABASE . '.posts' . ' ' . 'WHERE id = :id');
         $query->bindvalue(':id', $id, \PDO::PARAM_INT);
         $query->execute();
         $query-> setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'App\Entity\Post');
         return $query->fetch();

    }

    public function deletePost(int $id): bool
    {
        $query = $this->pdo->prepare('DELETE FROM ' . PDOFactory::DATABASE . '.posts' . ' ' . 'WHERE id = :id');
        $query->bindvalue(':id', $id, \PDO::PARAM_INT);
        return $query->execute();
    }

    public function addPost(Post $post): bool
    {
        $query = $this->pdo->prepare('INSERT INTO ' . PDOFactory::DATABASE . '.posts (title, content, publish_date, userId) VALUES (:title, :content, :publish_date, :userId)');
        $query->bindValue(':title', $post->getTitle(), \PDO::PARAM_STR);
        $query->bindValue(':content', $post->getContent(), \PDO::PARAM_STR);
        $query->bindValue(':publish_date', date('Y/m/d H:i:s'), \PDO::PARAM_STR);
        $query->bindValue(':userId', $post->getUserId(), \PDO::PARAM_INT);
        return $query->execute();
    }


    public function editPost(Post $post): bool
    {
        /*$query = $this->pdo->prepare('UPDATE ' . PDOFactory::DATABASE . '.posts SET title = :title, content = :content WHERE id = :id)');*/
        $query = 'UPDATE ' . \App\Factory\PDOFactory::DATABASE . '.posts SET title = :title, content = :content WHERE id = :id';

        $update = $this->pdo->prepare($query);

        $update->bindValue(':title', $post->getTitle(), \PDO::PARAM_STR);
        $update->bindValue(':content', $post->getContent(), \PDO::PARAM_STR);
        //$query->bindValue(':userId', $post->getUserId(), \PDO::PARAM_INT);
        $update->bindValue(':id', $post->getId(), \PDO::PARAM_INT);
        return $update->execute();
    }
}
    


