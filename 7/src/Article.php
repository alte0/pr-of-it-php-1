<?php

class Article
{
    protected string $article = '';

    public function __construct(string $article)
    {
        $this->article = $article;
    }

    public function getArticle(): array
    {
        return explode(' ; ', $this->article);
    }
}