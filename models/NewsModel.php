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
        $query = "SELECT news.*,categories.name FROM news join categories on news.category_id= categories.id  ORDER BY created_at DESC";
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
    public function update($id, $title, $content, $category_id, $public) {
        // Kết nối cơ sở dữ liệu
        $sql = 'UPDATE news SET title = ?, content = ?, category_id = ?, image = ? WHERE id = ?';
        $stmt = $this->db->prepare($sql);
        
        if ($stmt === false) {
            die('Lỗi khi chuẩn bị truy vấn: ' . $this->db->error);
        }
    
        // Gán giá trị vào các tham số
        $stmt->bind_param('ssiii', $title, $content, $category_id, $public, $id); // ssiii: chuỗi, số nguyên
    
        // Thực thi truy vấn
        $stmt->execute();
    
        // Kiểm tra kết quả
        $affectedRows = $stmt->affected_rows;
    
        // Đóng câu lệnh
        $stmt->close();
    
        return $affectedRows; // Trả về số bản ghi được cập nhật
    }
    
}