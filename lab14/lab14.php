<html>

<head>
    <meta charset="utf-8">
    <title>Лабораторная работа №13</title>
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
            ЛАБОРАТОРНАЯ РАБОТА №13
        </h1>
        <a href="../index.php">Назад</a>
    </div>
    <div class="code">
        <div class="zad1">
            <h3>Задание 1</h3>
            <?php
            class Car
            {
                private $mark;
                private $model;
                private $year;
                private $price;

                public function __construct($mark, $model, $year, $price)
                {
                    $this->mark = $mark;
                    $this->model = $model;
                    $this->year = $year;
                    $this->price = $price;
                }

                public function getMark()
                {
                    return $this->mark;
                }

                public function getModel()
                {
                    return $this->model;
                }

                public function getYear()
                {
                    return $this->year;
                }

                public function getPrice()
                {
                    return $this->price;
                }

                public function setMark($mark)
                {
                    $this->mark = $mark;
                }

                public function setModel($model)
                {
                    $this->model = $model;
                }

                public function setYear($year)
                {
                    $this->year = $year;
                }

                public function setPrice($price)
                {
                    $this->price = $price;
                }

                public function getFullInfo()
                {
                    return "Марка: " . $this->mark . "<br>Модель: " . $this->model . "<br>Год выпуска: " . $this->year . "<br>Цена: " . $this->price;
                }

                public function getPriceWithAge()
                {
                    return round($this->price * (1 - (date('Y') - $this->year) / 100), 2);
                }
            }

            $car = new Car("Тоyota", "Corolla", 2015, 1000000);
            $car2 = new Car("Tesla", "Model S", 2020, 900000);
            $car3 = new Car("BMW", "X5", 2016, 1000);

            echo $car->getFullInfo() . "<br>Цена с учетом возраста: " . $car->getPriceWithAge();
            echo "<br><br>" . $car2->getFullInfo() . "<br>Цена с учетом возраста: " . $car2->getPriceWithAge();
            echo "<br><br>" . $car3->getFullInfo() . "<br>Цена с учетом возраста: " . $car3->getPriceWithAge();
            ?>

        </div>
        <div class="zad1">
            <h3>Задание 2</h3>
            <?php
            class Student
            {
                private $name;
                private $age;
                private $group;
                private $marks = [];

                public function __construct($name, $age, $group)
                {
                    $this->name = $name;
                    $this->age = $age;
                    $this->group = $group;
                    $this->marks = [];
                }

                public function addMark($mark)
                {
                    array_push($this->marks, $mark);
                }

                public function getAverageMark()
                {
                    return round(array_sum($this->marks) / count($this->marks), 2);
                }

                public function getFullInfo()
                {
                    return "Средний балл студента " . $this->name . " из группы " . $this->group . " равен " . $this->getAverageMark();
                }
            }

            $student = new Student("Никита", 19, "10");
            $student->addMark(4);
            $student->addMark(5);
            $student->addMark(3);
            echo $student->getFullInfo() . " =(";

            ?>
        </div>
        <div class="zad1">
            <h3>Задание 3</h3>
            <?php
            class Letter
            {
                private $adresat_name;
                private $adresat_adress;
                private $adresant_name;
                private $adresant_adress;
                private $index;

                public function __construct($adresat_name, $adresat_adress, $adresant_name, $adresant_adress, $index)
                {
                    $this->adresat_name = $adresat_name;
                    $this->adresat_adress = $adresat_adress;
                    $this->adresant_name = $adresant_name;
                    $this->adresant_adress = $adresant_adress;
                    $this->index = $index;
                }

                public function getAdresatName()
                {
                    return $this->adresat_name;
                }

                public function setAdresatName($adresat_name)
                {
                    $this->adresat_name = $adresat_name;
                }

                public function getAdresatAdress()
                {
                    return $this->adresat_adress;
                }

                public function setAdresatAdress($adresat_adress)
                {
                    $this->adresat_adress = $adresat_adress;
                }

                public function getAdresantName()
                {
                    return $this->adresant_name;
                }

                public function setAdresantName($adresant_name)
                {
                    $this->adresant_name = $adresant_name;
                }

                public function getAdresantAdress()
                {
                    return $this->adresant_adress;
                }

                public function setAdresantAdress($adresant_adress)
                {
                    $this->adresant_adress = $adresant_adress;
                }

                public function getIndex()
                {
                    return $this->index;
                }

                public function setIndex($index)
                {
                    $this->index = $index;
                }

                public function __destruct()
                {
                    echo "<br>Доставлено письмо от " . $this->adresant_name . " (" . $this->adresant_adress . ") к " . $this->adresat_name . " (" . $this->adresat_adress . ") с индексом " . $this->index . "<br>";
                }
            }

            $letter1 = new Letter("Маша", "Москва, Ленина 12", "Петя", "Санкт-Петербург, Ленина 12", 12345);
            $letter2 = new Letter("Петя", "Санкт-Петербург, Ленина 12", "Маша", "Москва, Ленина 12", 67890);
            unset($letter1, $letter2);
            ?>
        </div>
        <div class="zad1">
            <h3>Задание 4</h3>
            <?php
            class Book
            {
                public $name;
                public $author;
                public $genre = [];
                public $year;
                public $pages;
                public $state = "новое";

                public function __construct($name, $author, $year, $pages)
                {
                    $this->name = $name;
                    $this->author = $author;
                    $this->year = $year;
                    $this->pages = $pages;
                }

                public function changeState($state)
                {
                    $this->state = $state;
                }

                final public function addGenre($genre)
                {
                    array_push($this->genre, $genre);
                }

                public function rewriteGenre($genre)
                {
                    $this->genre = $genre;
                }

                public function getFullInfo()
                {
                    return "Название: " . $this->name . "<br>Автор: " . $this->author . "<br>Жанр: " . implode(", ", $this->genre) . "<br>Год: " . $this->year . "<br>Количество страниц: " . $this->pages . "<br>Состояние: " . $this->state;
                }
            }

            class ElectronicBook extends Book
            {
                private $format;
                private $size;

                public function __construct($name, $author, $year, $pages, $format, $size)
                {
                    parent::__construct($name, $author, $year, $pages);
                    $this->format = $format;
                    $this->size = $size;
                }

                public function setFileFormat($format)
                {
                    $this->format = $format;
                }

                public function getFileFormat()
                {
                    return $this->format;
                }

                public function setFileSize($size)
                {
                    $this->size = $size;
                }

                public function getFileSize()
                {
                    return $this->size;
                }

                public function changeState($state)
                {
                    //ничего не делаем
                }

                public function getFullInfo()
                {
                    return parent::getFullInfo() . "<br>Формат файла: " . $this->format . "<br>Размер файла: " . $this->size;
                }
            }

            $book1 = new Book("Война и мир", "Лев Толстой", 1865, 1220);
            $book2 = new Book("Преступление и наказание", "Федор Достоевский", 1866, 640);
            $book3 = new Book("Анна Каренина", "Лев Толстой", 1877, 864);
            $book4 = new Book("Мастер и Маргарита", "Михаил Булгаков", 1936, 416);

            $ebook1 = new ElectronicBook("Война и мир", "Лев Толстой", 1865, 1220, "pdf", 10);
            $ebook2 = new ElectronicBook("Преступление и наказание", "Федор Достоевский", 1866, 640, "epub", 5);
            $ebook3 = new ElectronicBook("Анна Каренина", "Лев Толстой", 1877, 864, "fb2", 7);

            echo "<b>До:</b> <br>";
            echo $book1->getFullInfo() . "<br><br>";
            echo $book2->getFullInfo() . "<br><br>";
            echo $book3->getFullInfo() . "<br><br>";
            echo $book4->getFullInfo() . "<br><br>";
            echo $ebook1->getFullInfo() . "<br><br>";
            echo $ebook2->getFullInfo() . "<br><br>";
            echo $ebook3->getFullInfo() . "<br><br>";

            $book1->changeState("прочитано");
            $book2->changeState("новое");
            $ebook1->changeState("новое");
            $book1->name = "";
            $book3->addGenre("роман");
            $book4->rewriteGenre(["роман", "фэнтези"]);

            $ebook2->setFileFormat("pdf");
            $ebook3->setFileSize(10);

             echo "<b>После:</b> <br>";
            echo $book1->getFullInfo() . "<br><br>";
            echo $book2->getFullInfo() . "<br><br>";
            echo $book3->getFullInfo() . "<br><br>";
            echo $book4->getFullInfo() . "<br><br>";
            echo $ebook1->getFullInfo() . "<br><br>";
            echo $ebook2->getFullInfo() . "<br><br>";
            echo $ebook3->getFullInfo() . "<br><br>";
            ?>
        </div>
        <div class="zad1">
            <h3>Задание 5</h3>
            <?php
            interface Figure
            {
                public function getArea();
                public function getPerimeter();
            }

            class Circle implements Figure
            {
                private $radius;
                private $color = "black";

                public function __construct($radius)
                {
                    $this->radius = $radius;
                }

                public function getArea()
                {
                    return pi() * pow($this->radius, 2);
                }

                public function getPerimeter()
                {
                    return 2 * pi() * $this->radius;
                }
            }

            class Rectangle implements Figure
            {
                private $length;
                private $width;

                public function __construct($length, $width)
                {
                    $this->length = $length;
                    $this->width = $width;
                }

                public function getArea()
                {
                    return $this->length * $this->width;
                }

                public function getPerimeter()
                {
                    return 2 * ($this->length + $this->width);
                }
            }

            class Triangle implements Figure
            {
                private $a;
                private $b;
                private $c;

                public function __construct($a, $b, $c)
                {
                    $this->a = $a;
                    $this->b = $b;
                    $this->c = $c;
                }

                public function getArea()
                {
                    $p = ($this->a + $this->b + $this->c) / 2;
                    return sqrt($p * ($p - $this->a) * ($p - $this->b) * ($p - $this->c));
                }

                public function getPerimeter()
                {
                    return $this->a + $this->b + $this->c;
                }
            }

            $circle1 = new Circle(5);
            $circle2 = new Circle(10);

            $rectangle1 = new Rectangle(5, 10);
            $rectangle2 = new Rectangle(10, 15);

            $triangle1 = new Triangle(3, 4, 5);
            $triangle2 = new Triangle(5, 6, 7);

            echo "Площадь круга 1: " . $circle1->getArea() . "<br>";
            echo "Периметр круга 1: " . $circle1->getPerimeter() . "<br>";
            echo "Площадь круга 2: " . $circle2->getArea() . "<br>";
            echo "Периметр круга 2: " . $circle2->getPerimeter() . "<br>";
            echo "Площадь прямоугольника 1: " . $rectangle1->getArea() . "<br>";
            echo "Периметр прямоугольника 1: " . $rectangle1->getPerimeter() . "<br>";
            echo "Площадь прямоугольника 2: " . $rectangle2->getArea() . "<br>";
            echo "Периметр прямоугольника 2: " . $rectangle2->getPerimeter() . "<br>";
            echo "Площадь треугольника 1: " . $triangle1->getArea() . "<br>";
            echo "Периметр треугольника 1: " . $triangle1->getPerimeter() . "<br>";
            echo "Площадь треугольника 2: " . $triangle2->getArea() . "<br>";
            echo "Периметр треугольника 2: " . $triangle2->getPerimeter() . "<br>";
            ?>
        </div>
        <div class="zad6">
            <h3>Задание 6</h3>
            <?php
            class Animal {

                private $name;

                public function __construct($name) {
                    $this->name = $name;
                }

                public function getName() {
                    return $this->name;
                }

                public function sound() {
                    return "Animal sound";
                }
            }

            class Dog extends Animal {
                public function sound() {
                    return "Bark";
                }
            }

            class Cat extends Animal {
                public function sound() {
                    return "Meow";
                }
            }

            $dog = new Dog("Bob");
            $cat = new Cat("Alice");

            echo $dog->getName() . ": " . $dog->sound() . "<br>";
            echo $cat->getName() . ": " . $cat->sound() . "<br>";
            ?>
        </div>
    </div>
    <h4>Все права не защищены &copy</h4>
</body>

</html>