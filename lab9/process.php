<?php
session_start();

$name = isset($_GET['name']) ? $_GET['name'] : '';
$age = isset($_GET['age']) ? $_GET['age'] : '';
$gender = isset($_GET['gender']) ? $_GET['gender'] : '';

$_SESSION['user_data'] = [
    'name' => $name,
    'age' => $age,
    'gender' => $gender,
    'time' => date('Y-m-d H:i:s')
];

$image = '';
if ($gender == 'male') {
    $image = 'male.jpg';
} elseif ($gender == 'female') {
    $image = 'female.jpg';
}

$userData = isset($_SESSION['user_data']) ? $_SESSION['user_data'] : null;
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Данные формы 3</title>
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
            ДАННЫЕ ФОРМЫ 3
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <div class="zad1">
            <?php if ($userData): ?>
                <table border="1">
                    <tr>
                        <th>Имя</th>
                        <th>Возраст</th>
                        <th>Пол</th>
                        <th>Время получения данных</th>
                        <th>Изображение</th>
                    </tr>
                    <tr>
                        <td><?php echo htmlspecialchars($userData['name']); ?></td>
                        <td><?php echo htmlspecialchars($userData['age']); ?></td>
                        <td><?php echo htmlspecialchars($userData['gender']); ?></td>
                        <td><?php echo htmlspecialchars($userData['time']); ?></td>
                        <td>
                            <?php if ($userData['gender'] == 'male'): ?>
                                <img src="male.jpg" alt="Мужчина" style="max-width: 100px; max-height: 100px;">
                            <?php elseif ($userData['gender'] == 'female'): ?>
                                <img src="woman.jpg" alt="Женщина" style="max-width: 100px; max-height: 100px;">
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            <?php else: ?>
                <p>Нет данных для отображения.</p>
            <?php endif; ?>
        </div>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>