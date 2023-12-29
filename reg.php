<?php

$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
#переманная = фильтрует то что вводит пользователь убирает спец символы и берет значение с сайта
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

#проверка если длина пароля меньше 8 написать ...
if(mb_strlen($password)<8){
    echo "Длина пароля должна быть больше 8";
    exit();
}

#pass = md5($pass."SomeThing")
#       закодировать п ароль по желанию ковычки тем более по желанию



# подключение к БД  Ссылка на сервер Логин пароль название бд
$link = new mysqli('localhost', 'root', '' ,'User');
#Запрос на добавление в таблицу user_data значений с сайта
$link-> query("INSERT INTO `user_data` (`login`, `password`) VALUES('$login', '$password')");
# закрыть соединеник и вернутся на главную страницу
$link->close();
header('Location: /');
?>