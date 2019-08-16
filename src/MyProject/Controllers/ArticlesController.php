<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\NotFoundException;
use MyProject\Services\Db;
use MyProject\View\View;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
class ArticlesController
{
    /** @var View */
    private $view;

    /** @var Db */
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
        $this->db = Db::getInstance();
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

    public function edit(int $articleID): void
    {
        $article=Article::getById($articleID);

        if($article === null)
        {
            $this->view->renderHtml('errors/404.php',[],404);
            return;
        }

        $article->setName("New Name of the article");
        $article->setText("Text about something new");

        $article->save();

    }
    public function add(): void
    {
        $date = date('Y-m-d H:i:s');
        $author = User::getById(1);
        $article= new Article();
        $article->setName("How old?");
        $article->setText("One day I will ba 60");
        $article->setAuthor($author);
        $article->setCreatedAt($date);


        $article->save();
       var_dump($article);
    }

    public function delete (int $id) : void
    {
        $article = Article::getById($id);
        if ($article) {
            $article->delete();
            echo ' Статья удалена';
        } else{
            echo ' Статьи с таким id не существует';
        }



    }



}