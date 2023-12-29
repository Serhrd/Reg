<?php
setcookie('user', $user['login'], time()+600,"/");
header('Location: /');
?>