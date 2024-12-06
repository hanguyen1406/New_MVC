<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 15px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 15px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        .card h2 {
            margin: 0 0 10px;
            font-size: 1.5rem;
            color: #333;
        }

        .card p {
            margin: 0;
            color: #666;
            font-size: 1rem;
            line-height: 1.5;
        }

        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        form input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
            width: 300px;
        }

        form button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 0 4px 4px 0;
        }

        form button:hover {
            background-color: #0056b3;
        }

        .admin-link {
            text-align: center;
            margin-bottom: 20px;
        }

        .admin-link a {
            font-size: 1rem;
            color: #007bff;
        }

        .admin-link a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Trang tin tức cho khách</h1>
    <div class="admin-link">
        <a href="/admin">Đăng nhập admin</a>
    </div>

    <form action="/news/search" method="get">
        <input type="text" name="keyword" placeholder="Tìm kiếm tin tức..." required>
        <button type="submit">Tìm kiếm</button>
    </form>

    <div class="container">
        <?php foreach ($news as $item): ?>
            <div class="card">
                <a href="/news/detail?id=<?= $item['id']; ?>">
                    <h2><?= $item['title']; ?></h2>
                </a>
                <p><?= $item['content']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>