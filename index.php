<?php

// Get the URL path
$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
echo $path;

// Simple routing based on URL path
switch ($path) {

    case 'admin/add-new':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        echo "<br>See news ".$id;
        break;
    case 'admin/login':
        require_once 'controllers/AdminController.php';
        $controller = new AdminController();
        $controller->index();
        break;
    case 'admin/dangnhap':
        require_once 'controllers/AdminController.php';
        $controller = new AdminController();
        $controller->index();
        break;


    case 'news': // Hiển thị danh sách tin tức

        require_once 'controllers/NewsController.php';
        $controller = new NewsController();
        $controller->index(); // Gọi action index() để hiển thị danh sách tin tức
        break;

    case '': // Default route cho trang chủ (mặc định hiển thị danh sách tin tức)
        require_once 'controllers/NewsController.php';
        $controller = new NewsController();
        $controller->index(); // Gọi action index() khi không có path
        break;

    default: // 404 nếu không có route phù hợp
        http_response_code(404);
        echo "404 Not Found";
        break;
}
?>
