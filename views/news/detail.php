<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết tin tức</title>
</head>
<style> 
    .img{
        width: 200px;
        height: 200px;
    }
</Style>

<body>
    <h1><?= htmlspecialchars($news['title']) ?></h1>
    <p><strong>Ngày đăng:</strong> <?= htmlspecialchars($news['created_at']) ?></p>
    <img class = "img" src ="/public/<?= $news['image']?>">
    <p><?= nl2br(htmlspecialchars($news['content'])) ?></p>
    <a href="/news">Quay lại danh sách tin tức</a>
</body>
</html>
