<html>

<head>
    <meta charset="utf-8">
    <title>Контрольная работа №1</title>
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
<!-- Филон Никита Вариант 2 -->
<body>
    <div class="title">
        <h1>
            Контрольная работа №1
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <div class="zad1">
            <h3>Задание 1</h3>
            <?php
            //Верные _this, pi, работаем (b,c,d);
            $_this = 5;
            $pi = 6;
            $работаем = 7;
            echo $_this . $pi . $работаем;
            ?>
        </div>
        <div class="zad2">
            <h3>Задание 2</h3>
            <?php
            $var10 = 19;
            $var8 = 23;
            $var16 = 13;
            $var2 = 10011;
            echo "10: " . $var10 . "<br>8: " . base_convert($var8,8,10) . "<br>16: " . base_convert($var16,16,10) . "<br>2: " . base_convert($var2,2,10);
            ?>
        </div>
        <div class="zad3">
            <h3>Задание 3</h3>
            <?php
            echo "24*4/6 = " . (24*4)%6;
            ?>
        </div>
        <div class="zad4">
            <h3>Задание 4</h3>
            <?php
            //биты =(
            $bday = 16 << 3;
            echo $bday;
            ?>
        </div>
        <div class="zad5">
            <h3>Задание 5</h3>
            <?php
            const const1 = 17;
            define('const2',17);

            echo const1 . " " . const2;
            ?>
        </div>
        <div class="zad6">
            <h3>Задание 6</h3>
            <?php
            $t = rand(1,5);
            $v = rand(1,5);
            $R = (sin(2/pi())+exp($t)/(log(pow(1+pow($t,2)+pow($v,2),3))))*pow(pow($t,2)-pow($v,2),1/3);
            echo $R;
            ?>
        </div>
        <div class="zad7">
            <h3>Задание 7</h3>
            <?php
            $str = 'Filonnikita';
            $n = rand(1,intval(strlen($str)/2));
            $str1 = substr($str,0,$n);
            $str2 = substr($str,$n);

            $elem_replaced = 'x';  //как  получить код символа
            //substr($str,0,1) + substr($str, strlen($str));

            $new_str1 = str_replace(substr($str1,strlen($str1)-2, 1), ucfirst($elem_replaced), $str1);
            $new_str2 = str_split($str2);
            $num = intval(count($new_str2)/2);
            $new_str2[$num] = "!!";
            $new_str2 = implode("", $new_str2);

            echo $str . "<br> " . $new_str1 . "<br> " . $new_str2;
            ?>
        </div>
        <div class="zad8">
            <h3>Задание 8</h3>
            <?php
            $arr1 = ['a','b','c','d','q','y','o','p'];
            $arr2 = [1,2,3,4,5,6,7,8];
            $arrA = array_combine($arr1,$arr2);
            print_r($arrA);
            echo "<br>";

            $arrA['a'] = 5;
            $arrA['b'] = 3;
            $arrA['c'] = 4;
            $arrA['d'] = 5;
            $arrA['q'] = 6;
            $arrA['y'] = 8;
            $arrA['o'] = 7;
            $arrA['p'] = 1;

            echo array_rand($arrA) . "<br>";
            $keys = array_keys($arrA);

            echo $arrA[$keys[0]] . $arrA[$keys[1]] . $arrA[$keys[5]] . $arrA[$keys[6]] . $arrA[$keys[7]] . "<br>";
            $arrA2 = array_combine(array_values($arrA), array_keys($arrA));
            print_r($arrA2);
            ?>
        </div>
        <div class="zad9">
            <h3>Задание 9</h3>
            <?php
            $arrS = array_map(fn() => rand(10,41), range(1,8));
            print_r($arrS);
            $arrSmin1 = min($arrS);
            $arrS2 = array($arrSmin1);
            $arrS = array_diff($arrS, $arrS2);

            $arrSmin2 = min($arrS);
            $arrS2 = array($arrSmin2);
            $arrS = array_diff($arrS, $arrS2);

            $arrSmin3 = min($arrS);
            $arrS2 = array($arrSmin3);
            $arrS = array_diff($arrS, $arrS2);

            echo "Average: " . ($arrSmin1 + $arrSmin2 + $arrSmin3)/3;
            ?>
        </div>
        <div class="zad10">
            <h3>Задание 10</h3>
            <?php
            $dualArray = [
                ["Filon", "Haah", "Holovenko", "Yanukovich", "Ignatkova"],
                [rand(100,500),rand(100,500),rand(100,500),rand(100,500),rand(100,500)],
                [rand(100,500),rand(100,500),rand(100,500),rand(100,500),rand(100,500)],
                [rand(100,500),rand(100,500),rand(100,500),rand(100,500),rand(100,500)],
                [rand(100,500),rand(100,500),rand(100,500),rand(100,500),rand(100,500)],
                [rand(100,500),rand(100,500),rand(100,500),rand(100,500),rand(100,500)],
                [rand(100,500),rand(100,500),rand(100,500),rand(100,500),rand(100,500)],
                [rand(100,500),rand(100,500),rand(100,500),rand(100,500),rand(100,500)],
                [rand(100,500),rand(100,500),rand(100,500),rand(100,500),rand(100,500)],
                [rand(100,500),rand(100,500),rand(100,500),rand(100,500),rand(100,500)],
                [rand(100,500),rand(100,500),rand(100,500),rand(100,500),rand(100,500)],
                [rand(100,500),rand(100,500),rand(100,500),rand(100,500),rand(100,500)],
                [rand(100,500),rand(100,500),rand(100,500),rand(100,500),rand(100,500)]
            ];
            ?>
        </div>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>