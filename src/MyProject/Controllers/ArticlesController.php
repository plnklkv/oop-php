<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\View\View;

class ArticlesController
{
    /** @var View */
    private $view;

    protected $name;

    protected $text;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $this->view->renderHtml('articles/view.php', [
            'article' => $article
        ]);
    }

    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');

        var_dump($article);
    }

    public function add():void
    {
        $article = new Article();
        $article->setName('Новая статья 3');
        $article->setText('Новый текст 3');
        $article->setAuthorId('1');
        $article->setCreatedAt(date('Y-m-d H:i:s'));

        $article->save();
    }
}