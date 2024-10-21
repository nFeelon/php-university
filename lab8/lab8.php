<html>

<head>
    <meta charset="utf-8">
    <title>Лабораторная работа №8</title>
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
            ЛАБОРАТОРНАЯ РАБОТА №8
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <?php require '../functions.php' ?>
        <div class="zad1">
            <h3>Задание 1</h3>
            <?php
            my_dump(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10));
            ?>
        </div>
        <div class="zad2">
            <h3>Задание 2</h3>
            <?php
            my_dump($x = randomList(5));
            my_dump($y = randomList(10));
            my_dump($z = randomList(15));
            echo "X: " . summList($x) . "<br> Y: " . summList($y) . "<br> Z: " . summList($z);
            ?>
        </div>
        <div class="zad3">
            <h3>Задание 3</h3>
            <?php
            echo "New password: " . genPass(10, true, true);
            ?>
        </div>
        <div class="zad4">
            <h3>Задание 4</h3>
            <?php
            $twiced = callTwice('genPass', 10);
            my_dump($twiced());
            ?>
        </div>
        <div class="zad5">
            <h3>Задание 5</h3>
            <?php
            my_dump(simpN(20));
            ?>
        </div>
        <div class="zad6">
            <h3>Задание 6</h3>
            <?php
            echo convertDate('2024-10-5');
            ?>
        </div>
        <div class="zad7">
            <h3>Задание 7</h3>
            <?php
            my_dump(countRepeatsArray("hello world!aaaaaaaaa11111!"));
            ?>
        </div>
        <div class="zad8">
            <h3>Задание 8</h3>
            <?php
            createMenuFiles();

            readMenuFile("menu1.txt");
            echo "<br>";
            readMenuFile("menu2.txt");
            echo "<br>";
            readMenuFile("menu3.txt");
            echo "<br>";
            menu();
            ?>
        </div>
        <div class="zad9">
            <h3>Задание 9</h3>
            <form method="post">
                <button type="submit" name="my_click">Нажми меня</button>
            </form>

            <?php
            my_click();
            ?>
        </div>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>