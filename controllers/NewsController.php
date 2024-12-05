<?php

class NewsController
{
    public function index()
    {
        require_once 'models/NewsModel.php';
        $newsModel = new NewsModel();
        $news = $newsModel->getAllNews();
        require_once 'views/news/list.php';
    }
}
