
<?php


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

    // Соединение установлено успешно, можно выполнять операции с базой данных
    //echo "Соединение с базой данных установлено успешно!";


    //if (!$result){ echo "Ошибка выполнения запроса: " . pg_last_error($conn); pg_close($conn); exit;}//проверяем выполнение запроса, в случае неудачи выводим подробную ошибку
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------





$id = $_GET['id'];// Получаем значение 'id' из GET-запроса


$sql = "select r.name, rr.quant_reserv
from menu m 
join requirement_reserves rr on m.id = rr.id_menu  
join reserves r on rr.id_reserves = r.id
where m.id = $id";// Выполняем запрос к базе данных для получения данных по выбранному значению
$result = pg_query($conn, $sql);// Выполняем запрос к базе данных для получения данных по выбранному значению



if ($result) {// Проверяем успешность выполнения запроса
    $outputArray = array();// создаем массив в который будем сохранять вывод, массив объявляем заранее для избежания проблем с областью видимости
    while ($row = pg_fetch_assoc($result)) {// Формируем вывод строк с помощью цикла
        $outputArray[] = $row;//помещаем результат выборки в массив
    }
    
    echo json_encode($outputArray);


        
} else {//обработка и вывод ошибок
    echo "Ошибка выполнения запроса: " . pg_last_error($conn);//обработка и вывод ошибок
}



pg_close($conn);// Закрываем соединение с базой данных




    ?>
