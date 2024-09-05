<html>

<head>
    <meta charset="utf-8">
    <title>Лабораторная работа №5</title>
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
            ЛАБОРАТОРНАЯ РАБОТА №5
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <div class="zad1">
            <h3>Задание 1</h3>
            <?
            $firstname = "Nikita";
            $lastname = "Filon";

            $fullname = sprintf("%s %s", $firstname, $lastname);
            $length = strlen($fullname);
            echo "Full name : " . $fullname . "<br>";
            echo "Length : " . $length;
            ?>
        </div>
        <div class="zad2">
            <h3>Задание 2</h3>
            <?php
            $mainstr = 'sav15aanyamiiaD';
            $substr = 'aanya';

            $pos = strpos($mainstr, $substr);
            if ($pos !== false) {
                $start_index = max($pos - 2, 0);
                $end_index = $pos + strlen($substr) + 4;

                $result_ = substr($mainstr, $start_index, $end_index - $start_index);

                echo "Substring : " . $result_ . "<br>";
            } else {
                echo "Substring is not found";
            }
            ?>
        </div>
        <div class="zad3">
            <h3>Задание 3</h3>
            <?php
            $fullname2 = "filon nikita vitalyevich";

            $name_parts = explode(" ", $fullname2);
            $name_parts = array_map("ucwords", $name_parts);
            $final_name = implode(" ", $name_parts);
            echo "Final name : " . $final_name . "<br>";
            ?>
        </div>
        <div class="zad4">
            <h3>Задание 4</h3>
            <?php
            $nstring = '1234567890';
            $narray = str_split($nstring, 2);
            print_r($narray);
            ?>
        </div>
        <div class="zad5">
            <h3>Задание 5</h3>
            <?php
            $strings = "We dare the champions - my friend";
            $first_d = strpos($strings, 'd');
            $second_d = strrpos($strings, 'd');
            $first_e_pos = strpos($strings, 'e', 10);

            echo "First 'd' : " . $first_d . "<br>";
            echo "Last 'd' : " . $second_d . "<br>";
            echo "'e' symbol pos : " . $first_e_pos . "<br>";
            ?>
        </div>
        <div class="zad6">
            <h3>Задание 6</h3>
            <?php
            $rustr = "скоро надо будет писать диплом";
            $firstsp = strpos($rustr, ' '); //////9 - 19
            $secondsp = strpos($rustr, ' ', $firstsp + 1);

            echo "Second space : " . floor($secondsp / 2) . "<br>";

            $resultsp = rtrim($rustr, "!") . "!";
            echo $resultsp;
            ?>
        </div>
        <div class="zad7">
            <h3>Задание 7</h3>
            <?php
            $phone_number = "1234567890";

            $country_code = substr($phone_number, 0, 1);
            $area_code = substr($phone_number, 1, 3);
            $phone = substr($phone_number, 4);

            $formatted_phone_number = sprintf("+%s (%s) %s-%s0", $country_code, $area_code, substr($phone, 0, 3), substr($phone, 3));

            echo "Number: $formatted_phone_number";
            ?>
        </div>
        <div class="zad8">
            <h3>Задание 8</h3>
            <?php
            $quote = "our жизнь is beautiful.";
            $firstten = substr($quote, 0, 20);
            $secondten = str_replace("жизнь", "Жизнь", $firstten);
            $resultten = ucfirst($secondten);
            echo $resultten;
            ?>
        </div>
        <div class="zad9">
            <h3>Задание 9</h3>
            <?php
            $sentence = "что вершит судьбу человека?";
            $wordToFind = "судьбу";
            $sentence2 = strpos( $sentence, $wordToFind ) ?str_replace($wordToFind, "****", $sentence):"Слово не найдено";

            echo "Old : " . mb_strtolower($sentence, "UTF-8") . "<br>New : " . mb_strtolower($sentence2, "UTF-8"); /////////

            
            ?>
        </div>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>