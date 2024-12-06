<?php
require_once './models/NewsModel.php';

class NewsController
{
    public function index()
    {
        require_once 'models/NewsModel.php';
        $newsModel = new News();
        $news = $newsModel->getAllNews();
        require_once 'views/news/list.php';
    }
    public function detail($id) {
        //tạo đối tượng Model
        $newsModel = new News();

        //lấy chi tiết tin tức từ model
        $news = $newsModel ->getNews($id);
        //kiểm tra nếu tin tức không tồn tại
        if(!$news){
            echo"Tin tức ko tồn tại";
            return;
        }
        //gọi viewa để hiển thị chi tiết tin tức
        include 'views/news/detail.php';//truyền dữ liệu tin tức vào views

    }

}
?>

