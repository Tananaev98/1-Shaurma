<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {  //выполняем проверку на то что запрос к серверу является post 
    
    $login = $_POST["login"]; //извлекаем из post запроса, значение которое ввел пользователь и сохраняем в переменную. в свою очередь 
    //<input type="text" id="l1" name="login" placeholder="Логин"> для извлечения используется атрибут "name" тэга input
    $password = $_POST["password"]; //Аналогично "login"
echo "$login $password"; //проверка что данные нормально считываются
    }
?>
