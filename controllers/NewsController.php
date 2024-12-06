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
    public function add() {
        require_once 'models/Category.php';
        $category=new Category();
        $categories = $category->getAllCategory();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];
    
            // Xử lý upload file
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'public/';
                $fileName = basename($_FILES['image']['name']);
                $filePath = $uploadDir . $fileName;
    
                // Kiểm tra và di chuyển file vào thư mục
                if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
                    // Thêm bản ghi vào database cùng với đường dẫn ảnh
                    $newsModel = new News();
                    $newsModel->add($title, $content, $category_id, $fileName);
                    header('Location: ?action=manage_news');
                    exit;
                } else {
                    echo "Lỗi khi tải lên tệp.";
                }
            } else {
                echo "Vui lòng tải lên một hình ảnh hợp lệ.";
            }
        }
        include 'views/news/add.php';
    }
    
}
?>

