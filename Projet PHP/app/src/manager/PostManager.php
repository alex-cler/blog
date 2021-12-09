<?php





namespace App\Manager;

use App\Manager\BaseManager;



class PostManager extends BaseManager
{

    public function __construct(ConnectionInterface $pdo)
{
    parent::__construct($pdo);
}

    public function getAllPosts(): array
    {
        $query = $this->pdo->query('SELECT * FROM' . PDOFactory::DATABASE . '.posts');
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Entity\Post');
        return $query->fetchAll();
    }

    public function getPostByID(int $id): Post
    {
        $query = $this->pdo->prepare('SELECT * FROM' . PDOFactory::DATABASE . '.posts' . ' ' . 'WHERE id = :id');
        $query->bindvalue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query-> setFetchMode(\PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Entity\Post');
        return $query->fetch();
    }

    public function deletePost(int $id): bool
    {
        $query = $this->pdo->prepare('DELETE FROM' . PDOFactory::DATABASE . '.posts' . ' ' . 'WHERE id = :id');
        $query->bindvalue(':id', $id, \PDO::PARAM_INT);
        return $query->execute();
    }


    public function createPost(Post $post): bool
    {
        $query = $this->pdo->prepare('INSERT INTO' . PDOFactory::DATABASE . '.posts (title, content, publish_date, userId) VALUES (:title, :content, :publish_date, :userId)');
        $query->bindValue(:title, post->getTitle(), PDO::PARAM_STR);
        $query->bindValue(:content, post->getContent(), PDO::PARAM_STR);
        $query->bindValue(:pubish_date, date('Y/m/d H:i:s'), PDO::PARAM_STR);
        $query->bindValue(:userID, post->getUserId(), PDO::PARAM_INT);
        return $query->execute();
    }


    public function editPost(): bool
    {
        $query = $this->pdo->prepare('UPDATE' . PDOFactory::DATABASE . '.posts SET title = :title, content = :content, userId = :userId WHERE id = :id)');
        $query->bindValue(:title, post->getTitle(), PDO::PARAM_STR);
        $query->bindValue(:content, post->getContent(), PDO::PARAM_STR);
        $query->bindValue(:userID, post->getUserId(), PDO::PARAM_INT);
        $query->bindValue(:id, post->getId(), PDO::PARAM_INT);
        return $query->execute();
    }
}
    

$x = new PostManager();
$x->getAllPosts();