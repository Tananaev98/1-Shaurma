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



//------------------------------------------------------1 получаем данные-----------------------------------------------------------------------------------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {  //выполняем проверку на то что запрос к серверу является post 

    if (empty($_POST["id_object"])){echo "Идентификатор объекта не получен"; echo "</div>"; exit();} else {$id_object=$_POST["id_object"];}//если массив с введенным идентификатором пуст то выводим ошибку
//и прекращаем выполнение кода, если же массив содержит данные то сохраняем данные в переменную
    if (empty($_POST["name"])){echo "Название товара не введено!"; echo "</div>"; exit();} else {$name=$_POST["name"];}//если массив с введенным именем пуст то выводим ошибку
//и прекращаем выполнение кода, если же массив содержит данные то сохраняем данные в переменную

if (empty($_POST["description"])){echo "Описание товара не введено!"; echo "</div>"; exit();} else {$description=$_POST["description"];}//аналогично предыдущей строке

if (empty($_POST["price"])){echo "Цена товара не введена!"; echo "</div>"; exit();} else {$price=$_POST["price"];}//аналогично предыдущей строке

//if(!isset($_FILES['image'])){echo "Фото товара не загружено!"; echo "</div>"; exit();} //Выполняем проверку на загрузку изображения 
//if($_FILES['image']['error'] !== UPLOAD_ERR_OK){echo "Произошла ошибка при загрузке изображения"; echo "</div>"; exit();} //Выполняем проверку на ошибку загрузки изображения
//$image_name = $_FILES["image"]["name"];
//echo "$id_object<br>";
//echo "$name<br>";
//echo "$description<br>";
//echo "$price<br>";

}
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------


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

//------------------------------------------------------------Выполняем проверку на дубль имени объекта меню-------------------------------------------------------------------
$sql = "select * from menu where name = '$name' AND id <> $id_object";//Подготавливаем запрос по поиску соответсвия логина и пароля в базе. используем имя введенное пользователем
//для проверки его существующего дубля в базе данных 
$result = pg_query($conn, $sql);//выполняем запрос к бд используя подготовленное соединение и запрос

if (pg_num_rows($result) > 0) {//Если результат выборки больше нуля значит найден дубль необходимо вывести пользователю ошибку и прекратить выполнение кода

$row = pg_fetch_assoc($result);//сохраняем результат выборки в переменую в массив $row

echo "<h3 class='text_yellow'>Запись с таким именем уже существует! Имя должно быть уникальным!:</h3>";//Выводим ошибку 

$name_check = $row['name'];//сохраняем название из бд в переменную

$description_check = $row['description'];//сохраняем Описание из бд в переменную

$price_check = $row['price'];//сохраняем цену из бд в переменную

$link_check = $row['link_image'];//сохраняем ссылку на изображение из бд в переменную

echo "<span class='text_yellow'>Название:</span> $name_check <br>";//выводим название найденного совпадения

echo "<span class='text_yellow'>Описание:</span> $description_check<br>";//выводим описание найденного совпадения

echo "<span class='text_yellow'>Цена:</span> $price_check<br>";//выводим цену найденного совпадения

echo "<img src='$link_check'>";//выводим изображение найденного совпадения

echo "</div>";//закрываем блок со стилями в случае ошибки т.к. функция exit прекратит выполнение кода 

pg_close($conn);//Закрываем соединение с бд

exit();//прекращаем выполнение кода
}
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//------------------------------------------------------------Обновляем цену, наименование и описание на основании введенных данных--------------------------------------
$sql1 = "UPDATE menu
SET name = '$name', description = '$description', price = '$price'
WHERE id = $id_object";//Подготавливаем запрос по обновлению данных 
//для проверки его существующего дубля в базе данных
$result1 = pg_query($conn, $sql1);//выполняем запрос к бд используя подготовленное соединение и запрос

if (!$result1) {//Если результат выборки меньше единиы значит данных нет необходимо вывести пользователю ошибку и прекратить выполнение кода
    
    echo "Ошибка обновления данных " . pg_last_error($conn);//выводим подробную ошибку

    echo "</div>";//закрываем блок со стилями в случае ошибки т.к. функция exit прекратит выполнение кода 

    pg_close($conn);//Закрываем соединение с бд
    
    exit();//прекращаем выполнение кода
    }
   
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------


//-------------Проверка на загрузку изображения если изображение не загружено то прекращаем выполнение скрипта-----------------------------------------------------------------
if($_FILES['image']['error'] !== UPLOAD_ERR_OK){echo "Текстовые данные успешно обновлены"; echo "</div>"; exit();} //Выполняем проверку на ошибку загрузки изображения
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//если скрипт продолжает выполнение значит пользователь загрузил изображение


//------------------------------------------------------------Выполняем Запрос к БД для получения ссылки на изображение-------------------------------------------------------------------
$sql2 = "select * from menu where id = '$id_object'";//Подготавливаем запрос по поиску соответсвия логина и пароля в базе. используем имя введенное пользователем
//для проверки его существующего дубля в базе данных
$result2 = pg_query($conn, $sql2);//выполняем запрос к бд используя подготовленное соединение и запрос
$row2 = pg_fetch_assoc($result2);//сохраняем результат выборки в переменую в массив $row
$link_image = $row2['link_image'];//сохраняем ссылку на изображение из бд в переменную
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------


//-------------------------------------------------Удаление старого файла изображения -----------------------------------------------------------------------------------------
$filePath = "/var/www/html" . $link_image; //Создаем абсолютный путь к файлу изображения
if (file_exists($filePath)) { // Проверяем, существует ли файл
    if (unlink($filePath)) { // Удаляем файл
        echo "Старое Изображение успешно удаленно из каталога сервера<br><br>";//Сообщение в случае успешного выполнения 
    } else {
        echo "Ошибка при удалении Изображения<br><br>";//Сообщение в случае не удачного выполнения 
    }
} else {
    echo "Файл изображения не существует";//Изображения у объекта может и не быть поэтому это не всегда является ошибкой прекращать выполнение кода при отсутствии изображения 
    //не имеет смысла т.к. это не позволит удалять записи с отсутствующим изображением
}
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------




//------------------------------------------------------Загрузка нового изображения-----------------------------------------------------------------------------------------
$currentDateTime = date("YmdHis"); // для избежания проблем с кешированием браузеров нам необходимо сгенерировать уникальное имя изображения для этого нам понадобиться текущая дата и время 
//т.к. это значение не может повториться
$imageDir = "1_image/"; //Сохраняем директорию где хранятся изображения в переменную
$filename = $_FILES['image']['name']; // Получаем имя загруженного файла
$extension = pathinfo($filename, PATHINFO_EXTENSION); // Получаем расширение файла
$targetFile = $imageDir . $id_object . "_" . $currentDateTime . "." . $extension; // Соединяем путь к директории, имя файла и случайное число
$tmpFilePath = $_FILES["image"]["tmp_name"]; // сохраняем путь к временному файлу в переменную 
$targetFileDB = "/3_admin_panel/1_menu_panel/" . $targetFile; // Соединяем путь к директории и имя файла для базы данных

if (move_uploaded_file($tmpFilePath, $targetFile)) { //выполняем функцию по загрузке файла на сервер и проверяем успешность выполнения
    echo "Текстовые данные и изображение успешно обновлены в каталог <br>";// Файл успешно перемещен
    echo "<a href='/3_admin_panel/1_menu_panel/1_menu_panel.php'>Вернуться к редактированию меню</h3><br><br>";//сообщение об успешном выполненнии 
} else {
    // Произошла ошибка при перемещении файла
    echo "Ошибка при загрузке файла.";
    pg_close($conn);//Закрываем соединение с бд
    echo "</div>";//закрываем блок со стилями
    exit();
}
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//------------------------------------------------------------Обновляем ссылку на изображение в бд-----------------------------------------------------------------------------
$sql3 = "UPDATE menu
SET link_image = '$targetFileDB'
WHERE id = $id_object";//Подготавливаем запрос по обновлению данных 

$result3 = pg_query($conn, $sql3);//выполняем запрос к бд используя подготовленное соединение и запрос

if (!$result3) {//Если результат выборки меньше единиы значит данных нет необходимо вывести пользователю ошибку и прекратить выполнение кода
    
    echo "Ошибка обновления данных " . pg_last_error($conn);//выводим подробную ошибку

    echo "</div>";//закрываем блок со стилями в случае ошибки т.к. функция exit прекратит выполнение кода 

    pg_close($conn);//Закрываем соединение с бд
    
    exit();//прекращаем выполнение кода
    }
   
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

echo"</div>"; //выводим блок со стилями 
pg_close($conn);//Закрываем соединение с бд
?>



</body>
