<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - News List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .actions a {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            border-radius: 4px;
        }
        .actions a.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <h1>News List của Admin</h1>
    <h2>Welcome, <?= htmlspecialchars($_SESSION['user']); ?>!</h2>
    <div>
        <a href="/admin/addnews" style="padding: 10px; text-decoration: none; background-color: #28a745; color: white; border-radius: 4px;">Thêm Tin Tức</a>
        <a href="/admin/logout" style="padding: 10px; text-decoration: none; background-color: #dc3545; color: white; border-radius: 4px;">Logout</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['id']); ?></td>
                    <td><?= htmlspecialchars($item['title']); ?></td>
                    <td><?= htmlspecialchars($item['name'] ?? 'Uncategorized'); ?></td>
                    <td>
                        <div class="actions">
                            <a href="admin/editnews?id=<?= $item['id']; ?>">Edit</a>
                            <a href="admin/deletenews?id=<?= $item['id']; ?>" class="delete" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
