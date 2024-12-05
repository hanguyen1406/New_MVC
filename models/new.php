<?php
require_once 'config/database.php';

class News {
    private $conn;
    private $table = "news";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

   
}
