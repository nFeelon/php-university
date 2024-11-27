<html>

<head>
    <meta charset="utf-8">
    <title>Лабораторная работа №12</title>
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

        .rectangle {
            height: 100px;
            margin-bottom: 10px;
        }

        .zad4 {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .title,
        .image-title,
        .url-title,
        .effect-title,
        .effect-result-title {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .form {
            margin-bottom: 20px;
        }

        .label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }

        .select,
        .button {
            padding: 8px;
            font-size: 14px;
            width: 100%;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        .button:hover {
            background-color: #45a049;
        }

        .image,
        .effect-image {
            margin-top: 15px;
            max-width: 100%;
            height: auto;
            display: block;
        }

        .url {
            font-size: 14px;
        }

        .url a {
            color: #1E90FF;
            text-decoration: none;
        }

        .url a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="title">
        <h1>
            ЛАБОРАТОРНАЯ РАБОТА №12
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <div class="zad1">
            <h3>Задание 1</h3>
            <form action="" method="GET">
                <label for="length">Длина линии (px):</label>
                <input type="number" id="length" name="length" min="1" max="2000" value="100" required>
                <br><br>

                <label for="style">Тип линии:</label>
                <select id="style" name="style">
                    <option value="solid">Сплошной</option>
                    <option value="dashed">Чередующийся</option>
                    <option value="dotted">Точечный</option>
                    <option value="double">Двойной</option>
                </select>
                <br><br>

                <label for="color">Цвет линии:</label>
                <input type="color" id="color" name="color" value="#000000">
                <br><br>

                <label for="thickness">Толщина линии (px):</label>
                <input type="range" id="thickness" name="thickness" min="1" max="20" value="5">
                <br><br>

                <button type="submit">Apply</button>
            </form>

            <?php if (!empty($_GET['length'])): ?>
                <img src="draw_line.php?<?php echo http_build_query($_GET); ?>" alt="Линия">
            <?php endif; ?>
        </div>
        <div class="zad2">
            <h3>Задание 2</h3>
            <form action="" method="GET">
                <label for="circle_radius">Радиус круга (px):</label>
                <input type="number" id="circle_radius" name="circle_radius" min="10" max="500" value="50" required>
                <br><br>

                <label for="circle_fill_color">Цвет заливки круга:</label>
                <input type="color" id="circle_fill_color" name="circle_fill_color" value="#FF0000">
                <br><br>

                <label for="circle_border_thickness">Толщина обводки круга (px):</label>
                <input type="range" id="circle_border_thickness" name="circle_border_thickness" min="0" max="20"
                    value="5">
                <br><br>

                <label for="circle_border_color">Цвет обводки круга:</label>
                <input type="color" id="circle_border_color" name="circle_border_color" value="#000000">
                <br><br>

                <button type="submit">Нарисовать круг</button>
            </form>

            <?php if (!empty($_GET['circle_radius'])): ?>
                <img src="draw_circle.php?<?php echo http_build_query($_GET); ?>&t=<?php echo time(); ?>" alt="Круг">

            <?php endif; ?>
        </div>
        <div class="zad3">
            <h3>Задание 3</h3>
            <form method="GET">
                <label for="num1">Число 1:</label>
                <input type="number" id="num1" name="num1" min="1" max="5" required>
                <br><br>

                <label for="num2">Число 2:</label>
                <input type="number" id="num2" name="num2" min="1" max="5" required>
                <br><br>

                <label for="num3">Число 3:</label>
                <input type="number" id="num3" name="num3" min="1" max="5" required>
                <br><br>

                <button type="submit">Создать прямоугольники</button>
            </form>

            <?php if (!empty($_GET['num1'])): ?>
                <img src="draw_rectangles.php?<?php echo http_build_query($_GET); ?>" alt="Прямоугольники">
            <?php endif; ?>
        </div>
        <div class="zad4">
            <h3 class="title">Задание 4</h3>
            <form action="" method="GET" class="form">
                <label for="image" class="label">Выберите картинку:</label>
                <select id="image" name="image" class="select">
                    <option value="image1.jpg">Автор лабы</option>
                    <option value="image2.jpg">Фото на память</option>
                    <option value="image3.jpg">Пейзаж</option>
                </select>
                <br><br>

                <button type="submit" class="button">Выбрать картинку</button>
            </form>

            <?php if (!empty($_GET['image'])): ?>
                <?php $imagePath = isset($_GET['image']) ? $_GET['image'] : null; ?>
                <h3 class="image-title">Вы выбрали изображение: <?php echo $imagePath; ?></h3>
                <img src="<?php echo $imagePath; ?>" alt="Выбранное изображение" class="image">

                <h3 class="url-title">URL выбранного изображения:</h3>
                <p class="url"><a href="<?php echo $imagePath; ?>" target="_blank"><?php echo $imagePath; ?></a></p>

                <form action="" method="GET" class="form">
                    <input type="hidden" name="image" value="<?php echo basename($imagePath); ?>">
                    <label for="effect" class="label">Выберите эффект:</label>
                    <select id="effect" name="effect" class="select">
                        <option value="invert" <?php echo isset($_GET['effect']) && $_GET['effect'] == 'invert' ? 'selected' : ''; ?>>Инверсия цветов</option>
                        <option value="grayscale" <?php echo isset($_GET['effect']) && $_GET['effect'] == 'grayscale' ? 'selected' : ''; ?>>Градации серого</option>
                        <option value="highlight" <?php echo isset($_GET['effect']) && $_GET['effect'] == 'highlight' ? 'selected' : ''; ?>>Подсветка</option>
                        <option value="emboss" <?php echo isset($_GET['effect']) && $_GET['effect'] == 'emboss' ? 'selected' : ''; ?>>Рельеф</option>
                        <option value="pixelize" <?php echo isset($_GET['effect']) && $_GET['effect'] == 'pixelize' ? 'selected' : ''; ?>>Пикселизация</option>
                    </select>
                    <br><br>
                    <button type="submit" class="button">Применить эффект</button>
                </form>

                <?php if (!empty($_GET['effect'])): ?>
                    <h3 class="effect-result-title">Результат применения эффекта</h3>
                    <img src="apply_effect.php?<?php echo http_build_query($_GET); ?>" alt="Обработанное изображение"
                        class="effect-image">
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>