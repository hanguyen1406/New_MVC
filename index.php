<?php

// Get the URL path
$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
// echo $path;
session_start();

// Simple routing based on URL path
switch ($path) {

    case 'admin/add-new':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        echo "<br>See news " . $id;
        break;
    case 'admin/login':
        require_once 'controllers/AdminController.php';
        $controller = new AdminController();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller->showLoginForm();
        } else {
            $controller->login();
        }
        break;
    case 'admin/logout':
        require_once 'controllers/AdminController.php';
        $controller = new AdminController();
        $controller->logout();
        break;
    case 'admin':
        if (isset($_SESSION['user'])) {
            require_once 'controllers/AdminController.php';
            $controller = new AdminController();
            $controller->newadmin();
        } else {
            header('Location: /admin/login');
            exit();
        }
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


    case 'news/detail': // Route xem chi tiết tin tức
        require_once 'controllers/NewsController.php';
        $controller = new NewsController();
        $id = isset($_GET['id']) ? $_GET['id'] : null; // Lấy ID từ query string
        if ($id) {
            $controller->detail($id); // Gọi action detail() với tham số ID
        } else {
            echo "ID tin tức không hợp lệ!";
        }
        break;


    case 'news/search': //dduowngf dan tim kiem
        require_once './controllers/NewsController.php';
        $controller = new NewsController();
        $controller->search(); //goi phuong thuc search
        break;
}
