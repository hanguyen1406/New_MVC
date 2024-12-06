<?php

class AdminController
{
    public function index()
    {
        require_once 'views/admin/dashboard.php';
    }
    public function newadmin()
    {
        require_once 'models/NewsModel.php';
        $newsModel = new News();
        $news = $newsModel->getAllNews();
        require_once 'views/news/list.php';
    }
}
