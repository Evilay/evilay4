<?php

use App\Models\Users\User;

/**
 * @var User $user
 */
?>

@extends('layouts.app2')

@section('content')

    <head>
        <title>Голосование</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
        <link rel="stylesheet" href="public/assets/css/main.css"/>
        <noscript>
            <link rel="stylesheet" href="public/assets/css/noscript.css"/>
        </noscript>
    </head>


    <body class="homepage is-preloadb section-poll">
    <div id="page-wrapper">
        <!-- Header -->
        <div id="header">
            <!-- Inner -->
            <div class="inner">
                <header>
                    <h1><a href="index.blade.php" id="logo">Голосование</a></h1>
                    <hr/>
                    <p>Сделай свой выбор</p>
                </header>
                <footer>
                    <a href="#banner" class="button circled scrolly">Начать</a>
                </footer>
            </div>
            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="index.blade.php">Главная</a></li>
                    <li><a href="#banner">Голосования</a></li>
                    <li><a href="#main">Регистрация</a></li>
                    <li><a href="#features">Статистика</a></li>
                </ul>
            </nav>
        </div>
        <!-- Banner -->
        <section id="banner">
            <header>
                <h2>Голосования</h2>
                <p>
                    Выберите голосование в котором вы хотите принять участие </a>
                </p>
            </header>
        </section>
        <!-- Carousel -->
        <section class="carousel">
            <div class="reel">
                <article>
                    <a href="#" class="image featured"><img class="im32" src="/images/pi1.jpg" alt=""/></a>
                    <header>
                        <h3><a href="#">Президент Украины</a></h3>
                    </header>
                    <p>Какой кандидат по вашему мнению подходит на должность президента больше всех</p>
                </article>
                <article>
                    <a href="#" class="image featured"><img class="im32" src="/images/pi2.jpg" alt=""/></a>
                    <header>
                        <h3><a href="ctrl.php">Президент России</a></h3>
                    </header>
                    <p>Какой кандидат по вашему мнению подходит на должность президента больше всех</p>
                </article>
                <article>
                    <a href="#" class="image featured"><img class="im32" src="/images/pi3.jpg" alt=""/></a>
                    <header>
                        <h3><a href="right.blade.php">Президент США</a></h3>
                    </header>
                    <p>Какой кандидат по вашему мнению подходит на должность президента больше всех</p>
                </article>
            </div>
        </section>


        <!-- Main -->
        <div>
            <div class="wrapper2 style2">
                <article id="main" class="container special">
                    <header>
                        <h2>Вход в аккаунт</h2>
                        <p>Для подведения статистики голосов вы должны войти в аккаунт</p>
                    </header>
                </article>
            </div>
            <div style="display: flex;align-items: center;justify-content: center; width: 100%; margin-bottom: 2em; ">
                <div
                    style="display: flex; border-radius: 20px; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);justify-content: center; width: 38%;padding: 3.5%">
                    <form style="padding-right: 10%; border-right: 1px solid #707070">
                        <h1 style="text-align: center; margin-bottom: 5%; font-size: 28px">Регистрация</h1>
                        Введите имя
                        <input style="border-radius:10px; margin-bottom: 20px" type="text" name="log" id="name"
                               value="">
                        Введите номер паспорта
                        <input style="border-radius:10px; margin-bottom: 20px" type="text" name="id">
                        Введите пароль
                        <input style="border-radius:10px; margin-bottom: 20px" type="password" name="pas1">
                        Подтвердите пароль
                        <input style="border-radius:10px; margin-bottom: 30px" type="password" name="pas2">
                        <div style="text-align: center; width: 100%">
                            <button type="button" id="but1">Регистрация</button>
                        </div>
                    </form>
                    <form style="margin-left: 10%" ;>
                        <h1 style="text-align: center; margin-bottom: 5%; font-size: 28px">Авторизация</h1>
                        Введите номер паспорта
                        <input style="border-radius:10px; margin-bottom: 20px" type="text" name="id">
                        Введите пароль
                        <input style="border-radius:10px; margin-bottom: 20px" type="password" name="pas1">
                        <div style="text-align: center; width: 100%">
                            <input id="shop_ip" type="button" value="Вход">
                            <div style="background-color: white; width: 100px; height: 100px" id="myip">
                            </div>
                            <!-- <button type="submit" >Вход</button> -->
                        </div>
                    </form>
                </div>
            </div>
            <!-- Features -->
            <div class="wrapper style1">
                <section id="features" class="container special">
                    <header>
                        <h2>Статистика</h2>
                        <p>Финалистами в своих категориях на данный момент являются</p>
                    </header>
                </section>
            </div>
            <div class="gendio">
                <div class="sectiondio" >
                    <div class="sectiondio2">
                        <div class="sectiondio3">
                            <header>
                                <h3><a href="#" style="color: #483949;">Президент Украины</a></h3>
                            </header>
                            <p style="color: #483949;">1 место:</p>
                            <p style="color: #483949;">2 место:</p>
                            <p style="color: #483949;">3 место:</p>
                        </div>
                        <div style="display:inline-block; width: 40em; height: 25em; color: #483949;" id="oil"></div>
                    </div>
                </div>




                <div class="sectiondio" >
                    <div class="sectiondio2">
                        <div style="display:inline-block; width: 40em; height: 25em; color: #483949;" id="oil2"></div>
                        <div class="sectiondio3">
                            <header>
                                <h3><a href="#" style="color: #483949">Президент Украины</a></h3>
                            </header>
                            <p style="color: #483949">1 место:</p>
                            <p style="color: #483949">2 место:</p>
                            <p style="color: #483949">3 место:</p>
                        </div>
                    </div>
                </div>
                <div class="sectiondio" >
                    <div class="sectiondio2">
                        <div class="sectiondio3">
                            <header>
                                <h3><a href="#" style="color: #483949">Президент Украины</a></h3>
                            </header>
                            <p style="color: #483949">1 место:</p>
                            <p style="color: #483949">2 место:</p>
                            <p style="color: #483949">3 место:</p>
                        </div>
                        <div style="display:inline-block; width: 40em; height: 25em; color: #483949;" id="oil3"></div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <div id="footer">
                <div class="container">
                    <div class="row">
                        <!-- Copyright -->
                        <div class="copyright">
                            © Игорь Черепанов, 2019
                            Коммерческое использование материалов сайта GOLOSOVANIE.RU запрещено. В остальных случаях
                            обязательно наличие индексируемой ссылки со словом "Источник" на сайт или на страницу,
                            содержащую этот материал.
                        </div>
                        <script src="https://www.google.com/jsapi"></script>
                        <script src="assets/js/jquery.min.js"></script>
                        <script src="assets/js/jquery.dropotron.min.js"></script>
                        <script src="assets/js/jquery.scrolly.min.js"></script>
                        <script src="assets/js/jquery.scrollex.min.js"></script>
                        <script src="assets/js/browser.min.js"></script>
                        <script src="assets/js/breakpoints.min.js"></script>
                        <script src="assets/js/util.js"></script>
                        <script src="assets/js/main.js"></script>

                        <script src="script.js"></script>

                        <script>
                            var a = 1;

                            function toAnchor2(button) {
                                if (a == 1) {

                                    window.location.href = 'http://www.google.com';
                                } else {
                                    window.location.href = 'http://www.google.com';
                                }
                                ;
                            }
                        </script>

                        <script>
                            function toAnchor(button) {
                                $a = 0;
                                if ($a == 1) {
                                    document.getElementById('feature');
                                } else {
                                    window.location.href = 'http://www.google.com';
                                }
                                ;
                            }
                        </script>

                        <!--  <script type= "text/javascript">
                         function goToPage()
                         {
                             window.open('index.html#p26')

                         }
                         </script> -->

                        <script>

                            google.load("visualization", "1", {packages: ["corechart"]});
                            google.setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Год', '','',''],
                                    ['Путин', 500, 70, 90],
                                ]);
                                var options = {
                                    title: 'Добыча нефти',
                                    hAxis: {title: 'Год'},
                                    vAxis: {title: 'Тыс. тонн'}
                                };
                                var chart = new google.visualization.ColumnChart(document.getElementById('oil'));
                                chart.draw(data, options);
                            }
                        </script>
                        <script>
                            google.load("visualization", "1", {packages: ["corechart"]});
                            google.setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Год', 'Россия', 'США', 'Украина'],
                                    ['1860', 150, 70, 90],
                                ]);
                                var options = {
                                    title: 'Добыча нефти',
                                    hAxis: {title: 'Год'},
                                    vAxis: {title: 'Тыс. тонн'}
                                };
                                var chart = new google.visualization.ColumnChart(document.getElementById('oil2'));
                                chart.draw(data, options);
                            }
                        </script>
                        <script>
                            google.load("visualization", "1", {packages: ["corechart"]});
                            google.setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Год', 'Россия', 'США', 'Украина'],
                                    ['1860', 50, 70, 90],
                                ]);
                                var options = {
                                    title: 'Добыча нефти',
                                    hAxis: {title: 'Год'},
                                    vAxis: {title: 'Тыс. тонн'}
                                };
                                var chart = new google.visualization.ColumnChart(document.getElementById('oil3'));
                                chart.draw(data, options);
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@stop
