<?php
require_once 'BaseModel.php'; //kees thuwad BaseModel
class News extends BaseModel
{
    private $db;

    public function __construct()
    {
        // Kết nối cơ sở dữ liệu
        $this->db = new mysqli('localhost', 'root', '', 'news_db');
        if ($this->db->connect_error) {
            die("Kết nối thất bại: " . $this->db->connect_error);
        }
    }

    // Lấy danh sách tất cả tin tức
    public function getAllNews()
    {
        $query = "SELECT * FROM news join categories on news.category_id= categories.id  ORDER BY created_at DESC";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC); // Trả về danh sách dưới dạng mảng
    }
    //lấy chi tiết tin tức theo id
    public function getNews($id)
    {
        // Truy vấn sử dụng tham số để tránh SQL Injection
        $query = "SELECT * FROM news  where id = ".$id;
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }
    //Tìm kiếm tin tức
    
    public function construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=news_db', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
        }
    }

    // Phương thức tìm kiếm tin tức
    public function searchNews($keyword) {
        $query = "SELECT * FROM news  where title  like '%".$keyword."%'";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //thêm tin tức
    public function add($title, $content, $category_id, $image)
    {
        $query = "INSERT INTO news (title, content, category_id, image) VALUES ('$title', '$content', $category_id, '$image')";
        return $this->db->query($query);
    }
    //xóa tin tức
    public function delete($id)
    {
        echo $id;
        $query = "DELETE FROM news WHERE id = ".$id;
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }

}
