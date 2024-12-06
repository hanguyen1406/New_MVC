<!DOCTYPE html>
<html>
<head>
    <title>Edit News</title>
</head>
<body>
    
    <form method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($news['title']) ?>" required>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required><?= htmlspecialchars($news['content']) ?></textarea>

        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>" <?= $category['id'] == $news['category_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
<style>
    /* Global Styles */
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #74ebd5, #acb6e5);
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #333;
}

/* Form Container */
form {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    padding: 25px 35px;
    max-width: 450px;
    width: 100%;
    animation: fadeIn 0.8s ease-in-out;
}

/* Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Headings */
h1 {
    text-align: center;
    font-size: 1.8rem;
    margin-bottom: 20px;
    color: #555;
}

/* Form Labels */
label {
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
    color: #444;
}

/* Input Fields */
input[type="text"],
textarea,
select {
    width: 100%;
    padding: 12px 15px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
    transition: border-color 0.3s;
}

input:focus,
textarea:focus,
select:focus {
    outline: none;
    border-color: #74ebd5;
    box-shadow: 0 0 5px rgba(116, 235, 213, 0.5);
}

/* Textarea Styling */
textarea {
    height: 100px;
    resize: none;
}

/* Button Styles */
button {
    background: linear-gradient(135deg, #74ebd5, #acb6e5);
    color: #ffffff;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    width: 100%;
    transition: background 0.3s ease-in-out, transform 0.2s;
}

button:hover {
    background: linear-gradient(135deg, #acb6e5, #74ebd5);
    transform: scale(1.02);
}

/* Responsive Design */
@media (max-width: 480px) {
    form {
        padding: 20px;
    }

    h1 {
        font-size: 1.5rem;
    }
}

</style>