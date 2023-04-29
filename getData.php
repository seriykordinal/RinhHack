<?php 

    $host = "localhost"; 
    $username = "root"; 
    $password = "root"; 
    $database = "tornado"; 
    
    define('SECRET_KEY', 'my_secret_key');  
define('EXPIRATION_TIME', 3600); // время жизни токена (в секундах)

	require_once 'jwt-auth.php'; 
 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) { 
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    $jwt = authenticate($username, $password); 
    echo $jwt; 
} 
 
// При получении GET-запроса на проверку авторизации 
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['token'])) { 
    $token = $_GET['token']; 
    if (validate_token($token)) { 
        echo "Токен действителен."; 
    } else { 
        echo "Токен недействителен."; 
    } 
}

require_once 'jwt-auth.php'; 
 
// Получаем токен из заголовка авторизации 
$headers = getallheaders(); 
if (isset($headers['Authorization'])) { 
    $token = substr($headers['Authorization'], 7); 
    if (validate_token($token)) { 
        // Токен действителен, продолжаем работу 
    } else { 
        // Токен недействителен, выводим сообщение об ошибке 
        http_response_code(401); 
        die("Unauthorized"); 
    } 
} else { 
    // Заголовок авторизации не найден, выводим сообщение об ошибке 
    http_response_code(401); 
    die("Unauthorized"); 
}

    $user_ip = $_SERVER["REMOTE_ADDR"];

    $user_browser = $_SERVER['HTTP_USER_AGENT'];

    list($screen_width, $screen_height) = explode('x', $_GET['resolution']);

    $link = mysqli_connect($host, $username, $password, $database);

$id = uniqid("myprefix_", true) . "_" . rand(100000000,999999999);
echo "Случайный ID: " . $id;

if (mysqli_connect_errno()) {
   echo "Ошибка подключения: " . mysqli_connect_error();
   exit();
}

$sql = "INSERT INTO users (ip, browser, resolution)
   VALUES ('$user_ip', '$user_browser', '$screen_width x $screen_height')";

if (mysqli_query($link, $sql)) {
   echo "Данные добавлены успешно.";
} else {
   echo "Ошибка: " . mysqli_error($link);
}


$result = $mysqli->query("SHOW TABLES"); 
    if ($result->num_rows > 0) { 
        echo "<ul>"; 
        while ($row = $result->fetch_assoc()) { 
            $table = $row["Tables_in_" . $database]; 
            echo "<li><a href='http://localhost/phpmyadmin/db_structure.php?server=1&db={$database}&table={$table}'>{$table}</a></li>"; 
        } 
        echo "</ul>"; 
    } else { 
        echo "Нет таблиц в базе данных."; 
    } 

mysqli_close($link);
?>

?>
