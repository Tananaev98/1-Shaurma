<?php
session_start();//возобнавляем сессию
$_SESSION = array();//очищаем данные сессии

setcookie(session_name(), '', time() - 42000);//Очищаем cookie

session_destroy();//Завершаем сессию 

// Перенаправляем пользователя на страницу входа или другую страницу после выхода из системы
header("Location: ../index.html");
exit();//завершаем выполнение скрипта
?>

