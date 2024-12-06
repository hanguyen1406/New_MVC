<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News List</title>
</head>
<body>
    <h1>Trang tin tức cho khách</h1>
    <a href="/admin">Đăng nhập admin</a>
    <?php foreach ($news as $item): ?>
       <a href = "/news/detail?id=<?= $item['id']; ?>"> <h2><?= $item['title']; ?></h2></a>
        <p><?= $item['content']; ?></p>
    <?php endforeach; ?>
</body>
</html>
