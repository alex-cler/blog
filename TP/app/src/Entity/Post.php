<?php
namespace App\Entity;
use App\Entity\BaseEntity;

class Post extends BaseEntity
{
    private int $id;
    private string $title;
    private string $content;
    private string $publishedDate;
    private int $userId;
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getPublishedDate(): string
    {
        return $this->publishedDate;
    }

    /**
     * @param string $publishedDate
     */
    public function setPublishedDate(string $publishedDate): void
    {
        $this->publishedDate = $publishedDate;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
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