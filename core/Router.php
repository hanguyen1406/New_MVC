<?php
class Router {
    private $routes = [];

    public function add($route, $callback) {
        $this->routes[$route] = $callback;
    }

    public function dispatch($url) {
        $url = parse_url($url, PHP_URL_PATH); // Loại bỏ query string
        echo $url;
        if (array_key_exists($url, $this->routes)) {
            $callback = $this->routes[$url];
            $controller = $callback[0];
            $method = $callback[1];
    
            // Truyền tham số query string (nếu có) vào phương thức
            $queryParams = $_GET; // Lấy tất cả tham số từ query string
            call_user_func_array([$controller, $method], [$queryParams]);
        } else {
            foreach ($this->routes as $route => $callback) {
                if (trim($route, '/') === trim($url, '/')) {
                    return call_user_func($callback);
                }
            }
            http_response_code(404);
            echo "404 Not Found";
        }
    }
    
}
