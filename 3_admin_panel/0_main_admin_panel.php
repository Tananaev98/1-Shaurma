<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заголовок страницы</title>
    <style>
        body {
            background-color: #333333;/* Задаем фон страницы */
        }
        div { /* Задаем селектор который будет общим для текста */ 
          color: #FFFFFF;  /* Задаем фон текста */  
          font-family: "MyCustomFont", Arial, sans-serif; /* Задаем более симпатичный шрифт */
        }

        .authorization { /*Стиль для блока авторизации */
        width: 650px; /* Ширина блока */
        height: 350px; /* Высота блока */
        background-color: #FF7033; /* Цвет фона */
        color: #fff; /* Цвет текста */
        text-align: center; /* Выравнивание текста по центру */
        line-height: 50px; /* Высота строки для вертикального выравнивания текста */
        margin: 10% auto; /* Расположение по центру по горизонтали и с отступами */
        border: 4px solid white; /* Толстая белая рамка */
        border-radius: 10px; /* Закругленные углы */
        font-size: 24px; /* Установите желаемый размер шрифта */
        font-weight: bold; /* Установите желаемую жирность шрифта */
        text-align: center; /* Выравнивание текста по центру */
        justify-content: center; /* Центрирование содержимого по горизонтали */
        }
        a{
            color: #fff;
        }
        .fio_autorization{/* стиль для строки вывода активного пользователя и кнопки выхода */
            text-align: right; /* Выравнивание текста по правому краю */
            color: black; /* Цвет текста */
            padding: 20px; /* Отступы для текста */ 
        }
    </style>

</head>
<body>

<?php
//-------------------------------------------------------------------0 Настройки------------------------------------------------------
ini_set('display_errors', 1);//Включаем обнаружение ошибок
error_reporting(E_ALL);//Включаем обнаружение ошибок
//------------------------------------------------------------------------------------------------------------------------------------

session_start();// Запускаем сессию для проверки авторизации и аутентификации пользователей 

if (!isset($_SESSION['fio'])) {
    // Если сессия не инициализирована, перенаправляем пользователя на страницу входа или показываем сообщение об ошибке
    echo "<div class = 'authorization'>Вы не авторизованы!!!.<br><br><a href='../index.html'>Перейти на страницу авторизации</a></div>"; // Выводим пользователю сообщение о том что он
    // не авторизован и даем ему ссылку на страницу авторизации
    exit(); // Прерываем выполнение скрипта
}
if ($_SESSION['role'] !== "admin") { //после успешной авторизации дополнительно проводим проверку на аутентификацию
    echo "<div class = 'authorization'>Ваших прав недостаточно для просмотра этой страницы!!!!.<br><br><a href='../index.html'>Перейти на страницу авторизации</a></div>";//выводим 
    //сообщение в случае не удачной аутентификации
    exit(); // Прерываем выполнение скрипта
}
echo "<h3 class='fio_autorization'>{$_SESSION['fio']}<br><a href='..//2_authorization/2_exit.php'>Выход</a> </h3>"; //Вывод активного пользователя и кнопка выхода  
     
?>
<!-- дальнейший код html не будет отображен в случае не удачной авторизации или аутентификации-->
<h1><a href='1_menu_panel/1_menu_panel.php'>1 Управление меню</a></h1>

</body>