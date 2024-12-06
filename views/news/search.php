<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News List</title>
</head>
<body>
    <h1>Tìm kiếm tin tức</h1>

    <?php foreach ($news as $item): ?>
       <a href = "/news/detail?id=<?= $item['id']; ?>"> <h2><?= $item['title']; ?></h2></a>
        <p><?= $item['content']; ?></p>
    <?php endforeach; ?>


</body>
</html>