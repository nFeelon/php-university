<html>

<head>
    <meta charset="utf-8">
    <title>Лабораторная работа №6</title>
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
            ЛАБОРАТОРНАЯ РАБОТА №6
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <div class="zad1">
            <h3>Задание 1</h3>
            <?php
            $array = ["apple", "banana", "cherry"];
            array_push($array, "cucumber");
            $array2 = array_reverse($array);
            array_pop($array2);
            echo implode(", ", $array);
            echo "<br>";
            print_r($array2);
            ?>
        </div>
        <div class="zad2">
            <h3>Задание 2</h3>
            <?php
            $arrayr = array_map(fn() => rand(-20, 38), range(1, 20));
            $arrayr2 = $arrayr;
            print_r($arrayr2);

            sort($arrayr);
            echo "<br><br>";
            print_r($arrayr);

            $triar = array_slice($arrayr, 0, 3);
            echo "<br><br>";
            print_r($triar);

            $deletedel = implode(array_splice($triar, 1, 1, rand(-20, 38)));
            echo "<br><br>";
            print_r($triar);

            $index = array_search($deletedel, $arrayr2);
            echo "<br><br>Index : " . $index;
            ?>
        </div>
        <div class="zad3">
            <h3>Задание 3</h3>
            <?php
            $person = array(
                "name" => "Nikita",
                "age" => 19,
                "email" => "test@test.com"
            );
            $keys = array_keys($person);
            $values = array_values($person);
            print_r($keys);
            echo "<br>";
            print_r($values);
            $person["gender"] = "male";
            echo "<br>";
            print_r($person);
            ?>
        </div>
        <div class="zad4">
            <h3>Задание 4</h3>
            <?php
            $array1 = array(1, 20, 3, 4, 15, 6);
            $array2 = array(1, 10, 15, 20, 14, 25);
            $array3 = array_merge($array1, $array2);
            $array4 = array_unique($array3);
            print_r($array1);
            echo "<br>";
            print_r($array2);
            echo "<br>";
            print_r($array3);
            echo "<br>";
            print_r($array4);
            echo "<br>" . count($array4) . "<br>";

            $array5 = array_filter($array4, function ($n) {
                return $n % 2 == 0;
            });
            print_r($array5);
            echo "<br>";

            $array6 = array_map(function ($n) {
                return $n * $n;
            }, $array5);
            print_r($array6);
            echo "<br>";

            $array7 = array_sum($array6);
            print_r($array7);
            echo "<br>";
            ?>
        </div>
        <div class="zad5">
            <h3>Задание 5</h3>
            <?php
            $products = array(
                "apple" => 3.5,
                "banana" => 2.3,
                "orange" => 4.2,
                "pineapple" => 5,
                "lemon" => 1.1
            );

            $product_names = array_keys($products);
            print_r($product_names);
            echo "<br>";

            $product_values = array_values($products);
            $max_price = max($product_values);
            echo "Max price: " . $max_price . "<br>";

            foreach ($products as $product => $price) {
                echo "$product: $price ";
            }
            ?>
        </div>
        <div class="zad6">
            <h3>Задание 6</h3>
            <?php
            $students = array(
                array(
                    "name" => "Nikita",
                    "age" => "19",
                    "grade" => 3
                ),
                array(
                    "name" => "Eugene",
                    "age" => "20",
                    "grade" => 4
                ),
                array(
                    "name" => "Daniel",
                    "age" => "18",
                    "grade" => 5
                )
            );

            $names = array_column($students, "name");
            print_r($names);
            echo "<br>";

            $students = array_map(function ($student) {
                $student["grade"] += 5;
                return $student;
            }, $students);
            print_r($students);
            echo "<br>";
            ?>
        </div>
        <div class="zad7">
            <h3>Задание 7</h3>
            <?php
            $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            $a_months = array_chunk($months, 3);

            foreach ($a_months as $index => $month) {
                echo "№" . ($index + 1) . ": ";
                print_r($month);
                echo "<br>";
            }
            echo count($a_months);
            ?>
        </div>
        <div class="zad8">
            <h3>Задание 8</h3>
            <?php
            $names = "Anna. David. John. Marie. Zoe";
            $a_names = explode(".", $names);
            print_r($a_names);
            echo "<br>";

            sort($a_names, SORT_NATURAL);
            $a_names_reversed = array_reverse($a_names);
            print_r($a_names_reversed);
            echo "<br>";

            $firstname = reset($a_names);
            $lastname = end($a_names);
            echo "First: $firstname, Last: $lastname<br>";
            ?>
        </div>
        <div class="zad9">
            <h3>Задание 9</h3>
            <?php
            $city = array("Минск", "Брест", "Витебск", "Бобруйск");
            $temp = array(-5, -8, 106, 25);
            $city_temp = array_combine($city, $temp);
            arsort($city_temp);

            foreach ($city_temp as $index => $etemp) {
                echo "City: $index, Temp: $etemp<br>";
            }

            $max_temp_city = array_keys($city_temp, max($city_temp))[0];
            echo "Max temp city: $max_temp_city<br>";

            $average_temp = array_sum(array_values($city_temp)) / count(array_values($city_temp));
            echo "Average temp: $average_temp<br>";
            ?>
        </div>
        <div class="zad10">
            <h3>Задание 10</h3>
            <?php
            $array1 = [1, 2, 3, 4];
            $array2 = [3, 4, 5, 6];
            $array_df = array_diff($array1, $array2);
            $array_ints = array_intersect($array1, $array2);
            print_r($array_df);
            echo "<br>";
            print_r($array_ints);
            ?>
        </div>
        <div class="zad11">
            <h3>Задание 11</h3>
            <?php
            $array1 = ["a" => "apple", "b" => "banana"];
            $array2 = ["b"=> "berry", "c" => "cherry"];
            $merged_a = array_merge_recursive($array1, $array2);
            print_r($merged_a);
            echo "<br>" . count($merged_a);
            ?>
        </div>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>