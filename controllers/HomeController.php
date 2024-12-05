
<?php
require_once 'models/NewsModels.php';
class HomeController {
    public function index() {
        $newsModel = new News();
        $newsList = $newsModel->getAllNews(); // Lấy danh sách tin tức từ model
        include './views/home/index.php';    // Gọi view để hiển thị danh sách
    }
}
?>
