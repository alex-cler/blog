<?php 

namespace App\Manager;

use App\Factory\PDOFactory;
use App\Interfaces\ConnectionInterface;
use App\Manager\BaseManager;

class CommentManager extends BaseManager {

    public function getAllCommentsFromPostId(int $postId): array
    {
        $query = $this->pdo->prepare('SELECT * FROM ' .  PDOFactory::DATABASE . '.comments WHERE postId = :postId');
        $query->bindValue(':postId', $postId, \PDO::PARAM_INT);
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'App\Entity\user');
        return $query->fetchAll();
    }

    public function createComment(comment $comment): bool
    {
        $query = $this->pdo->prepare('INSERT INTO ' .  PDOFactory::DATABASE . '.comments (comment, publish_date, userId, postId) VALUES (:comment, publish_date, userId, postId)');
        $query->bindValue(':comment', $comment->getComment(), PDO::PARAM_STR);
        $query->bindValue(':publish_date', $comment->getPublishDate(), PDO::PARAM_STR);
        $query->bindValue(':userId', $comment->getUserId(), PDO::PARAM_INT);
        $query->bindValue(':postId', $comment->getPostId(), PDO::PARAM_INT);
        return $query->execute();
    }

    public function updateComment(comment $comment): bool
    {
        $query = $this->pdo->prepare('UPDATE ' .  PDOFactory::DATABASE . '.comments SET comment = :comment, publish_date = :publish_date, userId = :userId, postId = :postId WHERE id = :id');
        $query->bindValue(':comment', $comment->getComment(), PDO::PARAM_STR);
        $query->bindValue(':publish_date', $comment->getPublishDate(), PDO::PARAM_STR);
        $query->bindValue(':userId', $comment->getUserId(), PDO::PARAM_INT);
        $query->bindValue(':postId', $comment->getPostId(), PDO::PARAM_INT);
        $query->bindValue(':id', $comment->getId(), PDO::PARAM_INT);
        return $query->execute();
    }

    public function deleteComment(int $id): bool
    {
        $query = $this->pdo->prepare('DELETE ' . PDOFactory::DATABASE . '.comments WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }
}
