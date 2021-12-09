<?php
namespace App\Entity;
use App\Entity\BaseEntity;

class User extends BaseEntity
{
    private int $id;
    private string $pseudo;
    private string $email;
    private string $password;
    private int $postsId;
    private int $commentsId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getPostsId(): int
    {
        return $this->postsId;
    }

    /**
     * @param int $postsId
     */
    public function setPostsId(int $postsId): void
    {
        $this->postsId = $postsId;
    }

    /**
     * @return int
     */
    public function getCommentsId(): int
    {
        return $this->commentsId;
    }

    /**
     * @param int $commentsId
     */
    public function setCommentsId(int $commentsId): void
    {
        $this->commentsId = $commentsId;
    }
}