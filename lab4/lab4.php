<html>

<head>
    <meta charset="utf-8">
    <title>Лабораторная работа №4</title>
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
            ЛАБОРАТОРНАЯ РАБОТА №4
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <div class="zad1">
            <h3>Задание 1</h3>
            <?php
            const f = 16;
            const s = 5;
            define("l", 2005);
            define("k", 05);

            $result = pow(l, k) + sqrt(f) - 2 * s + log(s + l);
            echo $result;
            ?>
        </div>
        <div class="zad2">
            <h3>Задание 2</h3>
            <?php
            echo "PHP_Version : " . PHP_VERSION . "<br>";
            echo "PHP_OS : " . PHP_OS . "<br>";
            echo "PHP_INT_MAX : " . PHP_INT_MAX . "<br>";
            echo "PHP_EOL : " . PHP_EOL . "<br>";
            echo "DIRECTORY_SEPARATOR : " . DIRECTORY_SEPARATOR . "<br>";

            echo "<br> __LINE__ : " . __LINE__ . "<br>";
            echo "__FILE__ : " . __FILE__ . "<br>";
            echo "__DIR__ : " . __DIR__ . "<br>";

            function func()
            {
                echo "__FUNCTION__ : " . __FUNCTION__ . "<br>";
            }
            func();

            class cls
            {
                public static function classname()
                {
                    echo "__CLASS__ : " . __CLASS__ . "<br>";
                }

                public static function meth()
                {
                    echo "__METHOD__ : " . __METHOD__ . "<br>";
                }
            }
            cls::classname();
            cls::meth();

            trait trt
            {
                public function traitname(): string
                {
                    return "__TRAIT__ : " . __TRAIT__ . "<br>";
                }
            }
            class cls2
            {
                use trt;
            }

            $classt = new cls2;
            echo $classt->traitname() . "<br>";
            ?>
        </div>
        <div class="zad3">
            <h3>Задание 3</h3>
            <?php
            $x = rand();
            $y = rand();
            $z = rand();

            $result1 = sin(M_PI_4 * $x) * sqrt(abs(($y + log(pow($z, 2) + 1)) / ($x + $y + $z)));
            $result2 = $x * exp(-abs($x + $y) / 2) + cos(log10(1 + abs($y))) + pow($z, 1 / 3);

            echo "Result 1 : " . $result1 . "<br>";
            echo "Result 2 : " . $result2 . "<br>";
            ?>
        </div>
        <div class="zad4">
            <h3>Задание 4</h3>
            <?php
            $numberdec = 151;
            $numberbin = 1010111;
            $numberoct = '127';
            $numberhex = 'EE2';
            echo "<table border='1'>
                <thead>
                    <tr>
                        <th>Исходное число</th>
                        <th>В 10-ой системе</th>
                        <th>В 2-ой системе</th>
                        <th>В 8-ой системе</th>
                        <th>В 16-ой системе</th>
                    </tr>
                </thead>
                <tbody>";
            
            echo "<tr><td>" . $numberdec . "</td><td>" . "-" . "</td><td>" . decbin($numberdec) . "</td><td>" . decoct($numberdec) . "</td><td>" . dechex($numberdec) . "</td></tr>";
            echo "<tr><td>" . $numberbin . "</td><td>" . bindec($numberbin) . "</td><td>" . "-" . "</td><td>" . decoct(bindec($numberbin)) . "</td><td>" . dechex(bindec($numberbin)) . "</td></tr>";
            echo "<tr><td>" . $numberoct . "</td><td>" . octdec($numberoct) . "</td><td>" . decbin(octdec($numberoct)) . "</td><td>" . "-" . "</td><td>" . dechex(octdec($numberoct)) . "</td></tr>";
            echo "<tr><td>" . $numberhex . "</td><td>" . hexdec($numberhex) . "</td><td>" . decbin(hexdec($numberhex)) . "</td><td>" . decoct(hexdec($numberhex)) . "</td><td>" . "-" . "</td></tr>";
            
            echo "</tbody>
            </table>";
            ?>
        </div>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>