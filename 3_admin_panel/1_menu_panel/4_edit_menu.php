<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заголовок страницы</title>
    

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
    echo "<div class = 'authorization'>Ваших прав недостаточно для просмотра этой страницы!!!!.<br><br><a href='/index.html'>Перейти на страницу авторизации</a></div>";//выводим 
    //сообщение в случае не удачной аутентификации
    exit(); // Прерываем выполнение скрипта
}
echo "<h3 class='fio_autorization'>{$_SESSION['fio']}       <a href='../2_authorization/2_exit.php'><br>Выход</a> </h3>"; //Вывод активного пользователя и кнопка выхода  
 
?>


<style>
        body {
            background-color: #333333;/* Задаем фон страницы */
        }
        div { /* Задаем селектор который будет общим для текста */ 
          color: #FFFFFF;  /* Задаем фон текста */  
          font-family: "MyCustomFont", Arial, sans-serif; /* Задаем более симпатичный шрифт */
        }

        .authorization { /*Стиль для блока авторизации */
        width: 60%; /* Ширина блока */
        height: 850px; /* Высота блока */
        background-color: #FF7033; /* Цвет фона */
        color: #fff; /* Цвет текста */
        text-align: center; /* Выравнивание текста по центру */
        line-height: 50px; /* Высота строки для вертикального выравнивания текста */
        margin: -5% auto; /* Расположение по центру по горизонтали и с отступами */
        border: 4px solid white; /* Толстая белая рамка */
        border-radius: 10px; /* Закругленные углы */
        font-size: 20px; /* Установите желаемый размер шрифта */
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
        input[type="text"] { /* Задаем стиль для инпутов с типом текст */
        position: relative;/* позиция относительно блока */
        width: 50%; /* Установка ширины на 100%, чтобы элемент занимал всю доступную ширину */
        padding: 10px; /* Добавление внутреннего отступа в 10 пикселей вокруг текстового поля */
        margin-top: 3%; /* Добавление отступа снизу в 10 пикселей между текстовыми полями */
        border: none; /* Удаление границы текстового поля (без рамки) */
        border-radius: 5px; /* Закругление углов текстового поля с радиусом 5 пикселей*/
        background-color: #FFDAB9;/* цвет фона*/
        color:#FF7033;/* цвет текста внутри кнопки*/
        font-size: 16px; /* Установите желаемый размер шрифта */
        font-weight: bold; /* Установите желаемую жирность шрифта */
        }

        textarea { /* Задаем стиль для инпутов с типом пароль */
        position: relative;/* позиция относительно блока */
        width: 50%; /* Установка ширины на 100%, чтобы элемент занимал всю доступную ширину */
        padding: 10px; /* Добавление внутреннего отступа в 10 пикселей вокруг текстового поля */
        margin-top: 3%; /* Добавление отступа снизу в 10 пикселей между текстовыми полями */
        border: none; /* Удаление границы текстового поля (без рамки) */
        border-radius: 5px; /* Закругление углов текстового поля с радиусом 5 пикселей*/
        background-color: #FFDAB9;/* цвет фона*/
        font-size: 16px; /* Установите желаемый размер шрифта */
        font-weight: bold; /* Установите желаемую жирность шрифта */
        }

        input[type="submit"] { /* Задаем стиль для инпутов с типом пароль */
        position: relative;/* позиция относительно блока */
        width: 50%; /* Установка ширины на 100%, чтобы элемент занимал всю доступную ширину */
        padding: 10px; /* Добавление внутреннего отступа в 10 пикселей вокруг текстового поля */
        margin-top: 3%; /* Добавление отступа снизу в 10 пикселей между текстовыми полями */
        border: none; /* Удаление границы текстового поля (без рамки) */
        border-radius: 5px; /* Закругление углов текстового поля с радиусом 5 пикселей*/
        background-color: #FF4500;/* цвет фона*/
        color:#FFFFFF;/* цвет текста внутри кнопки*/
        }
        img {/* Стили для изображения*/
            height:200px;/* Высота изображения*/
            width:200px;/* ширина изображения*/
            border: 5px solid white; /* Задаем белую рамку толщиной 1 пиксель */
        }
    </style>
<?php
echo"<div class = 'authorization'>"; //выводим блок со стилями 

//-----------------------------------------------------------------Проверка получения идентификатора объекта-----------------------------------------------------
if (isset($_GET['id_object'])) {//выполняем проверку на получение идентификатора объекта из сценария 1_menu_panel.php
    $id_object = urldecode($_GET['id_object']);//если значение есть тогда декодируем его и  присваиваем значение в переменную для дальнейшего использования
} else {
  echo"Идентификатор объекта не получен!"; exit(); echo"</div'>";//Если значение не получено тогда выводим сообщение и прерываем сценарий
}
//echo "Идентификатор объекта получен!<br> его значение = $id_object";  
//---------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------Соединение с бд------------------------------------------------------------------------------
// Устанавливаем и проверяем соединение с базой данных
$db_host = "192.168.1.94"; // Имя хоста базы данных
$db_port = "5432"; // Порт базы данных (по умолчанию 5432 для PostgreSQL)
$db_name = "shaurmadb"; // Имя базы данных
$db_user = "adminsh"; // Имя пользователя базы данных
$db_password = "admin"; // Пароль пользователя базы данных
$conn = pg_connect("host=$db_host port=$db_port dbname=$db_name user=$db_user password=$db_password");//используя данные устанавливаем соединение

// Проверяем успешность соединения
if (!$conn) {
    
    echo "Ошибка подключения к базе данных: " . pg_last_error($conn);//в случае неудачи выводим ошибку
    exit; //прекращаем выполнение кода если соединение с базой не установленно, дабы избежать выполнение лишнего кода
} 

//Если соединение установленно успешно продолжаем выполнение кода
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//------------------------------------------------------------Делаем запрос к бд находим и выводим объект меню на основании идентификатора--------------------------------------
$sql = "select * from menu where id = '$id_object'";//Подготавливаем запрос по поиску соответсвия логина и пароля в базе. используем имя введенное пользователем
//для проверки его существующего дубля в базе данных
$result = pg_query($conn, $sql);//выполняем запрос к бд используя подготовленное соединение и запрос

if (pg_num_rows($result) < 1) {//Если результат выборки меньше единиы значит данных нет необходимо вывести пользователю ошибку и прекратить выполнение кода
    
    echo "<h3 class='text_yellow'>Запись с таким идентификатором не найдена, возможно она уже удалена</h3>";//Выводим ошибку 

    echo "</div>";//закрываем блок со стилями в случае ошибки т.к. функция exit прекратит выполнение кода 

    pg_close($conn);//Закрываем соединение с бд
    
    exit();//прекращаем выполнение кода
    }

$row = pg_fetch_assoc($result);//сохраняем результат выборки в переменую в массив $row

$name_check = $row['name'];//сохраняем название из бд в переменную

$description_check = $row['description'];//сохраняем Описание из бд в переменную

$price_check = $row['price'];//сохраняем цену из бд в переменную

$link_check = $row['link_image'];//сохраняем ссылку на изображение из бд в переменную
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

?>

<!-- Форма для ввода данных -->
<form action="4.1_edit_menu.php" method="post" enctype="multipart/form-data" id="formID" ><!-- создаем форму для последующей отправки в php -->
<p>Отредактируйте поля которым требуются правка, поля правка которым не нужна оставьте без изменений</p><!-- Заголовок формы -->
<input type="text" id="l1" name="name" value="<?php echo $name_check ?>"><!-- Поле для ввода названия нового объекта -->
<textarea name="description" id="l3" rows="4" cols="50" ><?php echo $description_check ?></textarea><br><!-- Поле для ввода описания нового объекта -->
<input type="text" id="l2" name="price" value="<?php echo $price_check ?>"><br><!-- Поле для ввода цены нового объекта -->
<?php echo "<img src='$link_check'>";//выводим изображение найденного совпадения ?>
<p>При необходимости, добавьте новое фото в формате 400x400 пикселей</p><input type="file" id="l3" name="image"><br><!-- Поле для загрузки фото объекта -->
<input type="hidden" name="id_object" value="<?php echo $id_object ?>"><!-- Скрытое поле формы для возможности передачи идентификатора объекта методом POST -->
<input type="submit" value="Обновить данные"><!-- Кнопка "Создать" -->

</form>


<script>
//----------------------------------------C Помощью js предотавращаем вставку лишних пробелов в имени файла---------------------------------------------    
// Получаем ссылку на форму
var form = document.getElementById("formID");

// Добавляем обработчик события submit
form.addEventListener("submit", function(event) {
    // Получаем значение из поля ввода
    var userInput = document.getElementById("l1").value;
    var userInput2 = document.getElementById("l2").value;
    var userInput3 = document.getElementById("l3").value;

    // Удаляем пробелы в начале и в конце строки
    userInput = userInput.trim();
    userInput2 = userInput2.trim();
    userInput3 = userInput3.trim();

    // Удаляем дублирующиеся пробелы
    userInput = userInput.replace(/\s+/g, ' ');
    userInput2 = userInput2.replace(/\s+/g, ' ');
    userInput3 = userInput3.replace(/\s+/g, ' ');
    // Устанавливаем очищенное значение обратно в поле ввода
    document.getElementById("l1").value = userInput;
    document.getElementById("l2").value = userInput2;
    document.getElementById("l3").value = userInput3;
    
    // Теперь можно явно отправить форму на сервер
    form.submit();
    
    // Далее можно выполнить другие действия, например, отправить данные на сервер с помощью JavaScript или выполнить другие операции.
});
//-------------------------------------------------------------------------------------------------------------------------------------------------------
</script>    


<?php
echo"</div>"; //выводим блок со стилями 

?>

</body>