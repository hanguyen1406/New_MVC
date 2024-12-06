<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết tin tức</title>
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

        .content-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 15px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .content-container img {
            display: block;
            margin: 20px auto;
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .content-container p {
            color: #666;
            font-size: 1rem;
            line-height: 1.6;
        }

        .content-container strong {
            color: #333;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            text-align: center;
            padding: 10px 20px;
            background-color: #f1f1f1;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        a:hover {
            background-color: #e0e0e0;
        }

        .back-link {
            text-align: center;
        }
        .img{
            width: 100%; /* Chiều rộng 100% so với container */
            height: auto; /* Tự điều chỉnh chiều cao theo tỷ lệ gốc */
            max-height: 450px; /* Đặt chiều cao tối đa để tránh ảnh quá cao */
            object-fit: cover; /* Cắt ảnh để vừa khung và không méo */
            display: block; /* Loại bỏ khoảng cách dưới ảnh */
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="content-container">
        <h1><?= htmlspecialchars($news['title']) ?></h1>
        <p><strong>Ngày đăng:</strong> <?= htmlspecialchars($news['created_at']) ?></p>
        <img class="img" src="/public/<?= htmlspecialchars($news['image']) ?>" alt="News Image">
        <p><?= nl2br(htmlspecialchars($news['content'])) ?></p>
    </div>
    <div class="back-link">
        <a href="/news">Quay lại danh sách tin tức</a>
    </div>
</body>
</html>