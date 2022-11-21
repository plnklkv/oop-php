<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\View\View;
use MyProject\Models\Users\User;
use MyProject\Exceptions\NotFoundException;

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
            throw new NotFoundException();
        }

        $this->view->renderHtml('articles/view.php', [
            'article' => $article
        ]);
    }

    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');

        var_dump($article);
    }

    public function add(): void
    {
        $author = User::getById(1);

        $article = new Article();
        $article->setAuthor($author);
        $article->setName('Новое название статьи 2');
        $article->setText('Новый текст статьи 2');

        $article->save();

        var_dump($article);
    }

    public function delete(int $articleId)
    {
        $article = Article::getById($articleId);

        if($article == null) {
            throw new NotFoundException();
        } else {
            $article->delete();
            echo 'Статья удалена.';
        }

    }
}