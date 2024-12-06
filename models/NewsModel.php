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
        $query = "SELECT * FROM news ORDER BY created_at DESC";
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
    public function searchNews($keyword){
    $sql = "SELECT * FROM news WHERE title LIKE :keyword OR content LIKE :keyword";
    $stmt = $this->conn->prepare($sql);
    $searchTerm = "%" . $keyword . "%";
    $stmt->bindParam(':keyword', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về danh sách các tin tức
    }
}
