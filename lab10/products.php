<?php
include 'db.php';

// Обработка формы добавления товара
if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $supplier_id = $_POST['supplier_id'];

    // Проверка, активен ли поставщик
    $stmt = $pdo->prepare("SELECT is_active FROM suppliers WHERE id = :supplier_id");
    $stmt->execute(['supplier_id' => $supplier_id]);
    $supplier = $stmt->fetch();

    if ($supplier && $supplier['is_active'] == 1) {
        $stmt = $pdo->prepare("INSERT INTO products (name, price, category_id, supplier_id) VALUES (:name, :price, :category_id, :supplier_id)");
        $stmt->execute(['name' => $product_name, 'price' => $price, 'category_id' => $category_id, 'supplier_id' => $supplier_id]);
        header("Location: products.php");
        exit();
    } else {
        echo "<p style='color:red;'>Нельзя добавить товар с заблокированным поставщиком.</p>";
    }
}

// Получение всех товаров с названиями категорий и поставщиков
$query = "
    SELECT products.*, categories.name AS category_name, suppliers.name AS supplier_name
    FROM products
    JOIN categories ON products.category_id = categories.id
    JOIN suppliers ON products.supplier_id = suppliers.id
";
$products = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);

// Получение всех категорий для выпадающего списка
$categories = $pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);

// Получение всех поставщиков для выпадающего списка
$suppliers = $pdo->query("SELECT * FROM suppliers WHERE is_active = 1")->fetchAll(PDO::FETCH_ASSOC);
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

        .product-card {
            border: 1px solid #ccc;
            padding: 16px;
            margin: 10px;
            border-radius: 8px;
            display: inline-block;
            width: 200px;
            vertical-align: top;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="title">
        <h1>
            ПРОДУКТЫ
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <!-- Вывод товаров в виде карточек -->
        <div>
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <h2><?= htmlspecialchars($product['name']) ?></h2>
                    <p>Цена: <?= htmlspecialchars($product['price']) ?> ₽</p>
                    <p>Категория: <?= htmlspecialchars($product['category_name']) ?></p>
                    <p>Поставщик: <?= htmlspecialchars($product['supplier_name']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Форма добавления товара -->
        <h2>Добавить товар</h2>
        <form method="POST">
            <input type="text" name="product_name" required placeholder="Название товара">
            <input type="number" step="0.01" name="price" required placeholder="Цена">

            <!-- Выпадающий список категорий -->
            <select name="category_id" required>
                <option value="">Выберите категорию</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
                <?php endforeach; ?>
            </select>

            <!-- Выпадающий список поставщиков (только активные) -->
            <select name="supplier_id" required>
                <option value="">Выберите поставщика</option>
                <?php foreach ($suppliers as $supplier): ?>
                    <option value="<?= $supplier['id'] ?>"><?= htmlspecialchars($supplier['name']) ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit" name="add_product">Добавить</button>
        </form>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>