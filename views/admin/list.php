<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News List</title>
</head>
<body>
    <h1>News List cua Admin</h1>
    <?php foreach ($news as $item): ?>
        <h2><?= $item['title']; ?></h2>
        <p><?= $item['content']; ?></p>
    <?php endforeach; ?>
</body>
</html>
