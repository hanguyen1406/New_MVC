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
    case 'admin/dangnhap':
        require_once 'controllers/AdminController.php';
        $controller = new AdminController();
        $controller->index();
        break;
    case '': // Default route for the home page
        require_once 'controllers/NewsController.php';
        $controller = new NewsController();
        $controller->index();
        break;
    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}
?>