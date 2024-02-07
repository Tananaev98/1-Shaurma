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
    </style>

</head>
<body>

<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {  //выполняем проверку на то что запрос к серверу является post 
    
    //------------------------------------------------------получаем данные----------------------------------------------------------
    if (!empty($_POST["login"]) && !empty($_POST["password"])) { //проверяем ввод данных со стороны пользователя

        $login = $_POST["login"]; //извлекаем из post запроса, значение которое ввел пользователь и сохраняем в переменную. в свою очередь 
        //<input type="text" id="l1" name="login" placeholder="Логин"> для извлечения используется атрибут "name" тэга input
    
        $password = $_POST["password"]; //Аналогично "login"

        echo "<div class = 'authorization'>$login+$password</div>";
    } else {
        echo "<div class = 'authorization'>Пожалуйста, введите логин и пароль.<br><br><a href='../index.html'>Вернуться к вводу</a></div>"; //Обрабатываем ошибку в случае если пользователь не ввел логин и пароль
    }
    //-------------------------------------------------------------------------------------------------------------------------------
    
   


    }
?>
</body>