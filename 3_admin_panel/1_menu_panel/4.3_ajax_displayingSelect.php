
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


//---------------------------------------------------------------------------Подготавливаем и выполняем запрос к бд--------------------------------------------------
$id = $_GET['id'];// Получаем значение 'id' из GET-запроса


$sql1 = "select r.id, r.name
FROM reserves r
LEFT JOIN requirement_reserves rr ON r.id = rr.id_reserves AND rr.id_menu = $id
WHERE rr.id IS null
AND r.availability = 'Разрешен';";//Подготавливаем запрос по поиску соответсвия логина и пароля в базе. используем обратную сортировку для того что бы
//записи со значением "Разрешен" выводились вверху а "Запрещен" соотвественно внизу
$result1 = pg_query($conn, $sql1);//выполняем запрос к бд используя подготовленное соединение и запрос

if (!$result1){ echo "Ошибка выполнения запроса: " . pg_last_error($conn); exit;}//проверяем выполнение запроса, в случае неудачи выводим подробную ошибку
//------------------------------------------------------------------------------------------------------------------------------------------------------------------



if ($result1) {// Проверяем успешность выполнения запроса
    
    $options = array(); // массив для хранения опций

    while ($row1 = pg_fetch_assoc($result1)) { //цикл для перебора результатов
        $options[] = array('id' => $row1['id'], 'name' => $row1['name']);//помещаем результаты в массив
    }
    

echo json_encode($options); // возвращаем данные в формате JSON
} else {//обработка и вывод ошибок
    echo "Ошибка выполнения запроса: " . pg_last_error($conn);//обработка и вывод ошибок
}



pg_close($conn);// Закрываем соединение с базой данных




    ?>

