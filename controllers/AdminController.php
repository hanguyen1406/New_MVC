<?php

class AdminController
{
    public function index()
    {
        require_once 'views/admin/dashboard.php';
    }
    public function showLoginForm()
    {
        require_once 'views/admin/login.php';
    }
    public function newadmin()
    {
        require_once 'models/NewsModel.php';
        $newsModel = new News();
        $news = $newsModel->getAllNews();
        require_once 'views/admin/list.php';
    }
    public function login()
    {
        // Dữ liệu người dùng mẫu (thay bằng DB trong thực tế)
        $users = [
            'admin' => '1',
            'user' => '1'
        ];

        // Kiểm tra thông tin đăng nhập
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if (isset($users[$username]) && $users[$username] === $password) {
            $_SESSION['user'] = $username;
            header('Location: /admin');
        } else {
            echo "Sai tài khoản hoặc mật khẩu";
            echo "<br><a href='/admin/login'>Try Again</a>";
        }
    }

    // Xử lý đăng xuất
    public function logout()
    {
        session_destroy();
        header('Location: /');
        exit();
    }
}
