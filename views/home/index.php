<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách tin tức</title>
</head>
<body>
    <h1>Danh sách tin tức</h1>
    <?php if (!empty($newsList)): ?>
        <ul>
            <?php foreach ($newsList as $news): ?>
                <li>
                    <a href="index.php?controller=home&action=detail&id=<?= $news['id'] ?>">
                        <?= htmlspecialchars($news['title']) ?>
                    </a>
                    <p><?= htmlspecialchars($news['summary']) ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Không có tin tức nào!</p>
    <?php endif; ?>
</body>
</html>
