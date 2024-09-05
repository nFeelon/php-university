<html>

<head>
    <meta charset="utf-8">
    <title>Лабораторная работа №2</title>
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
    </style>
</head>

<body>
    <div class="title">
        <h1>
            ЛАБОРАТОРНАЯ РАБОТА №2-3
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <div class="zad1">
            <h3>Задание 1</h3>
            <?
            $firstb = false;
            $secondb = True;
            $thirdb = True;

            echo "Bool1 = ". (int) $firstb . ", Bool2 = $secondb, Bool3 = $thirdb. <br> B1 + B2 = " . $firstb + $secondb . ", B1 * B2 =" . $firstb * $secondb . ", B 1- B3 =" . $firstb - $thirdb . ", B2 / B3 =" . $secondb / $thirdb;
            ?>
        </div>
        <div class="zad2">
            <h3>Задание 2</h3>
            <?
            $data = [
                5,
                5.0,
                "1",
                "5.0",
                true,
                false,
                0,
                0.0,
                "0",
                "",
                null,
                [],
                ['5'],
                new stdClass(),
                "00000000"
            ];

            foreach ($data as $value) {
                $result = (bool) $value;
                echo var_export($value, true) . " = " . var_export($result, true) . "<br>";
            }
            ?>
        </div>
        <div class="zad3">
            <h3>Задание 3</h3>
            <?
            $dec_number = 42;
            $oct_number = 052;
            $bin_number = 11;
            $hex_number = '2A';

            $dec_number2 = 100;
            $oct_number2 = 0144;
            $bin_number2 = 1111111;
            $hex_number2 = '6F';

            $bin_number3 = 1100100;
            $hex_number3 = 'FF';

            echo $dec_number . "\n";
            echo OctDec($oct_number) . "\n";
            echo BinDec($bin_number) . "\n";
            echo HexDec($hex_number) . "\n";

            echo $dec_number2 . "\n";
            echo OctDec($oct_number2) . "\n";
            echo BinDec($bin_number2) . "\n";
            echo HexDec($hex_number2) . "\n";

            echo BinDec($bin_number3) . "\n";
            echo HexDec($hex_number3) . "\n";
            ?>
        </div>
        <div class="zad4">
            <h3>Задание 4</h3>
            <?
            $val1 = (int) FALSE;
            $val2 = (int) 255.6565;
            $val3 = intval(98.1221);
            $val4 = intval(10.5);
            $val5 = intval((16 / 5) * 2005);

            echo $val1 . " " . $val2 . " " . $val3 . " " . $val4 . " " . $val5;

            ?>
        </div>
        <div class="zad5">
            <h3>Задание 5</h3>
            <?
            $floatVar1 = 3.14;
            $floatVar2 = 2.718;
            $floatVar3 = 1.618;
            $floatVar4 = 5.55;

            $intVar = 42;
            $floatVar5 = (float) $intVar;
            $floatVar6 = (float) 10;

            $floatVar7 = floatval("123.45");
            $floatVar8 = floatval("67.89");

            $result = 5 / 2;
            $floatVar9 = $result;
            $floatVar10 = 10 / 3;

            $resulted = $floatVar1 . " " . $floatVar2 . " " . $floatVar3 . " " . $floatVar4 . " " . $floatVar5 . " " . $floatVar6 . " " . $floatVar7 . " " . $floatVar8 . " " . $floatVar9 . " " . $floatVar10;

            $stringVar1 = 'абвгд';
            $name = 'Никита';
            $stringVar2 = "Привет, $name";
            $stringVar3 = <<<TEXT
qwerty12345
TEXT;

            echo $resulted;
            print "<br>" . $stringVar1 . " " . $stringVar2 . " ";
            printf("Float: %.2f<br>", $stringVar3);
            ?>

        </div>
        <div class="zad6">
            <h3>Задание 6</h3>
            <?
            $value_ = "123";
            echo intval($value_) . " " . (float) $value_ . " " . $value_ + 10;
            ?>
        </div>
        <div class="zad7">
            <h3>Задание 7</h3>
            <?
            $a = 5;
            $b = 10;
            echo intval(($a > 0) && ($b < 15)) . " " . intval(($a > 0) || ($b < 15));

            $isNegative = !($a >= 0);
            echo " Is Minus?:" . ($isNegative ? 'Да ' : 'Нет ') . "<br>";

            $price = 1234.56;
            $formattedPrice = number_format($price, 2, '.', ',');
            echo "<br>" . $formattedPrice;

            $stringNumb = "1000000";
            $numbNumb = (int) $stringNumb;
            echo "<br>" . $numbNumb . " " . (float) $numbNumb;
            ?>
        </div>
        <div class="zad8">
            <h3>Задание 8</h3>
            <?
            $stringNum = "42";
            $intNum = (int) $stringNum;
            echo $intNum;

            $result_ = $stringNum + 10;
            echo "<br>" . $result_ . " = " . gettype($result_);
            ?>
        </div>
        <div class="zad9">
            <h3>Задание 9</h3>
            <?
            $stringVar = "Hello, world!";
            $intVar = 42;
            $floatVar = 3.14;
            $boolVar = true;

            echo "<br>";
            var_dump($stringVar);
            var_dump($intVar);
            var_dump($floatVar);
            var_dump($boolVar);

            echo "<br>";
            echo is_string($stringVar) . "<br>";
            echo is_int($intVar) . "<br>";
            echo is_float($floatVar) . "<br>";
            echo is_bool($boolVar) . "<br>";
            ?>
        </div>
        <div class="zad10">
            <h3>Задание 10</h3>
            <?
            $userName = "Никита Филон";
            $userAge = 19;
            $userBalance = 1000.75;

            echo "Имя: $userName, Возраст: [$userAge], Баланс: " . number_format($userBalance, 2) . "<br>";
            ?>
        </div>
        <div class="zad11">
            <h3>Задание 11</h3>
            <?php
            $a = 10; //1010
            $b = 6; //0110

            $andResult = $a & $b;
            echo "(AND): $andResult <br>";

            $orResult = $a | $b;
            echo "(OR): $orResult <br>";

            $xorResult = $a ^ $b;
            echo "(XOR): $xorResult <br>";

            $leftShiftResult = $a << 1;
            echo "(<<): $leftShiftResult <br>";

            $rightShiftResult = $a >> 1;
            echo "(>>): $rightShiftResult <br>";
            ?>
        </div>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>