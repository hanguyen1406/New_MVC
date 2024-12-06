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
        //gọi views để hiển thị chi tiết tin tức
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
                    header('Location: /admin');
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
    //xóa tin tức
    public function delete($id) {
        $newsModel = new News();
        $newsModel->delete($id); // Gọi phương thức xóa tin tức
        header('Location: /admin/'); // Chuyển hướng về trang quản lý tin tức
        exit;
    }
    

    public function edit($id) {
        require_once 'models/Category.php';
        $newsModel = new News();
        $categoryModel = new Category();

        $news = $newsModel->getNews($id); // Lấy tin tức theo ID
        $categories = $categoryModel->getAllCategory(); // Lấy tất cả danh mục

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];
            $public = isset($_POST['public']) ? 1 : 0; // Kiểm tra xem tin tức có được công khai không

            // Xử lý upload file
            $fileName = $news['image']; // Giữ nguyên ảnh cũ nếu không tải ảnh mới
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'public/';
                $newFileName = basename($_FILES['image']['name']);
                $filePath = $uploadDir . $newFileName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
                    $fileName = $newFileName; // Cập nhật tên ảnh mới
                } else {
                    echo "Lỗi khi tải lên tệp.";
                }
            }

            $newsModel->update($id, $title, $content, $category_id, $public, $fileName); // Cập nhật tin tức
            header('Location: /admin/'); // Chuyển hướng về trang quản lý tin tức
            exit;
        }

        include 'views/news/edit.php'; // Hiển thị form chỉnh sửa tin tức
    }
} 
?>

