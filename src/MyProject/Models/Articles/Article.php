<?php

namespace MyProject\Models\Articles;
use MyProject\Models\Users\User;
use MyProject\Models\ActiveRecordEntity;

class Article extends ActiveRecordEntity
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $text;

    /** @var string */
    protected $authorId;

    /** @var string */
    protected $createdAt;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name):void
    {
        $this->name=$name;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
    public function setText(string $text):void
    {
        $this->text=$text;
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    public function setCreatedAt(string $createdAt):void
    {
        $this->createdAt=$createdAt;
    }

    protected static function getTableName(): string
    {
        return 'article';
    }

    /**
     * @return int
     */
    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }
}