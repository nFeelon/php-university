<?php
include 'db.php';

if (isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];
    $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (:name)")->execute(['name' => $category_name]);;
    header("Location: lab10.php");
    exit();
}

if (isset($_POST['delete_category'])) {
    $category_id = $_POST['category_id'];
    $pdo->prepare("DELETE FROM products WHERE category_id = :category_id")->execute(['category_id' => $category_id]);
    $pdo->prepare("DELETE FROM categories WHERE id = :category_id")->execute(['category_id' => $category_id]);
    header("Location: lab10.php");
    exit();
}

if (isset($_POST['update_category'])) {
    $old_name = $_POST['old_name'];
    $new_name = $_POST['new_name'];
    $stmt = $pdo->prepare("UPDATE categories SET name = :new_name WHERE name = :old_name");
    $stmt->execute(['new_name' => $new_name, 'old_name' => $old_name]);
    header("Location: lab10.php");
    exit();
}

$categories = $pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Лабораторная работа №10</title>
    <style>
        .title {
            text-align: center;
            border-bottom: solid;
            padding-bottom: 20px;
            margin-top: 50px;
        }

        body {
            background-color: #ECECFF;
        }

        h4 {
            font-weight: normal;
            margin-top: 600px;
            text-align: center;
        }

        .code {
            margin-top: 50px;
            font-size: 1.5em;
        }

        table,
        tr,
        th,
        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="title">
        <h1>
            ЛАБОРАТОРНАЯ РАБОТА №10
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <h1>Категории</h1>

        <ol>
            <?php foreach ($categories as $category): ?>
                <li><?= htmlspecialchars($category['name']) ?></li>
            <?php endforeach; ?>
        </ol>

        <h2>Добавить категорию</h2>
        <form method="POST">
            <input type="text" name="category_name" required placeholder="Название категории">
            <button type="submit" name="add_category">Добавить</button>
        </form>

        <h2>Удалить категорию</h2>
        <form method="POST">
            <select name="category_id" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="delete_category">Удалить</button>
        </form>

        <h2>Изменить категорию</h2>
        <form method="POST">
            <input type="text" name="old_name" required placeholder="Текущее название категории">
            <input type="text" name="new_name" required placeholder="Новое название категории">
            <button type="submit" name="update_category">Изменить</button>
        </form>

        <p>
            <a href="products.php">Товары</a> |
            <a href="suppliers.php">Поставщики</a>
        </p>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>