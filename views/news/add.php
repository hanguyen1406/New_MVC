<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .form-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
        }

        .form-container input, .form-container textarea, .form-container select, .form-container button {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-container button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .form-container input[type="file"] {
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add News</h1>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="content" placeholder="Content" rows="5" required></textarea>
            <select name="category_id" required>
                <option value="" disabled selected>Select Category</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>">
                        <?= htmlspecialchars($category['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit" >Add News</button>
        </form>
    </div>
</body>
</html>
