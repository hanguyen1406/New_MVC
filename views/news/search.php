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
            color: #007bff;
        }

        .card h2:hover {
            text-decoration: underline;
        }

        .card p {
            margin: 0;
            color: #666;
            font-size: 1rem;
            line-height: 1.5;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Tìm kiếm tin tức</h1>

    <div class="container">
        <?php foreach ($news as $item): ?>
            <div class="card">
                <a href="/news/detail?id=<?= $item['id']; ?>">
                    <h2><?= htmlspecialchars($item['title']) ?></h2>
                </a>
                <p><?= htmlspecialchars($item['content']) ?></p>
            </div>
        <?php endforeach; ?>
        <div class="back-link">
            <a href="/news">Quay lại danh sách tin tức</a>
        </div>
    </div>
</body>
</html>