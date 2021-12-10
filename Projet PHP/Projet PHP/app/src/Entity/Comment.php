<?php
namespace App\Entity;
use App\Entity\BaseEntity;

class Comment extends BaseEntity
{
    private int $id;
    private string $content;
    private string $publishedDate;
    private int $userId;
    private int $postId;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getPublishedDate(): string
    {
        return $this->publishedDate;
    }

    public function setPublishedDate(string $publishedDate): void
    {
        $this->publishedDate = $publishedDate;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getPostId(): int
    {
        return $this->postId;
    }

    public function setPostId(int $postId): void
    {
        $this->postId = $postId;
    }
}