<?php
$login=filter_var(trim($_POST['LOGIN']),FILTER_SANITIZE_STRING);
$email=filter_var(trim($_POST['EMAIL']),FILTER_SANITIZE_STRING);
$password=filter_var(trim($_POST['PASSWORD']),FILTER_SANITIZE_STRING);



if(trim($login)==" "){
    echo "Укажите логин";
}
if(trim($email)==" "){
    echo "Укажите email";
}
if(trim($password)==" "){
    echo "Укажите пароль";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 echo "Некорректно введён email";
 exit();
}
else if(mb_strlen($password)<5){
    echo "Недопустимая длина пароля";
    exit(); 
}
$result=mysqli_query($mysql,"SELECT * FROM `users` WHERE 'LOGIN'=$login");
else if(mysql_num_rows($result)>0){
    echo"Такой логин уже существует";
    exit();
}

require_once 'connect.php';
mysqli_query($mysql, "INSERT INTO `users` (`ID`,`LOGIN`,`EMAIL`,`PASSWORD`)VALUES(NULL,'$login','$email','$password')");
header('Location: logout.php');
?>
