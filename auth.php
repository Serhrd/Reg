<?php
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
#переманная = фильтрует то что вводит пользователь убирает спец символы и берет значение с сайта
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);





$link = new mysqli('localhost', 'root', '' ,'User');
#Поиск в бд существует ли 
$result = $link->query("SELECT * FROM `user_data` WHERE `login` = '$login' AND `password` = '$password'");

$user = $result-> fetch_assoc();

if(count($user)==0){
    echo "Пользователь не найден";
    exit();
}
setcookie('user', $user['login'], time()+600,"/");
#Создаем куким с названием user которая будет жить 600 секунд

# закрыть соединеник и вернутся на главную страницу
$link->close();
header('Location: /');
?>