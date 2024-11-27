<?php
include 'db.php';

if (isset($_POST['add_supplier'])) {
    $supplier_name = $_POST['supplier_name'];
    $contact_info = $_POST['contact_info'];
    $stmt = $pdo->prepare("INSERT INTO suppliers (name, contact_info, is_active) VALUES (:name, :contact_info, 1)");
    $stmt->execute(['name' => $supplier_name, 'contact_info' => $contact_info]);
    header("Location: suppliers.php");
    exit();
}

if (isset($_POST['block_supplier'])) {
    $supplier_id = $_POST['supplier_id'];
    $stmt = $pdo->prepare("UPDATE suppliers SET is_active = 0 WHERE id = :supplier_id");
    $stmt->execute(['supplier_id' => $supplier_id]);
    header("Location: suppliers.php");
    exit();
}

if (isset($_POST['unblock_supplier'])) {
    $supplier_id = $_POST['supplier_id'];
    $stmt = $pdo->prepare("UPDATE suppliers SET is_active = 1 WHERE id = :supplier_id");
    $stmt->execute(['supplier_id' => $supplier_id]);
    header("Location: suppliers.php");
    exit();
}

$suppliers = $pdo->query("SELECT * FROM suppliers")->fetchAll(PDO::FETCH_ASSOC);
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
            ПОСТАВЩИКИ
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <table border="1">
            <tr>
                <th>Название</th>
                <th>Контактная информация</th>
                <th>Статус</th>
            </tr>
            <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?= htmlspecialchars($supplier['name']) ?></td>
                    <td><?= htmlspecialchars($supplier['contact_info']) ?></td>
                    <td><?= $supplier['is_active'] ? 'Активен' : 'Заблокирован' ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>Добавить поставщика</h2>
        <form method="POST">
            <input type="text" name="supplier_name" required placeholder="Название поставщика">
            <input type="text" name="contact_info" required placeholder="Контактная информация">
            <button type="submit" name="add_supplier">Добавить</button>
        </form>

        <h2>Блокировать поставщика</h2>
        <form method="POST">
            <select name="supplier_id" required>
                <?php foreach ($suppliers as $supplier): ?>
                    <?php if ($supplier['is_active']): ?>
                        <option value="<?= $supplier['id'] ?>"><?= htmlspecialchars($supplier['name']) ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="block_supplier">Блокировать</button>
        </form>

        <h2>Разблокировать поставщика</h2>
        <form method="POST">
            <select name="supplier_id" required>
                <?php foreach ($suppliers as $supplier): ?>
                    <?php if (!$supplier['is_active']): ?>
                        <option value="<?= $supplier['id'] ?>"><?= htmlspecialchars($supplier['name']) ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="unblock_supplier">Разблокировать</button>
        </form>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>