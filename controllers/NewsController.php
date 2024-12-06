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
    public function search() {
        if (isset($_GET['keyword'])) {
            $keyword = trim($_GET['keyword']); // Lấy từ khóa từ query string
            $newsModel = new News();
            $news = $newsModel->searchNews($keyword); // Gọi Model để tìm kiếm
            include 'views/news/search.php'; // Hiển thị kết quả tìm kiếm
        } else {
            echo "Vui lòng nhập từ khóa tìm kiếm!";
        }
    }
}
?>

