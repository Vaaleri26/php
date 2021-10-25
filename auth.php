<?php
$login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);

$password=filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

require_once 'connect.php';
$user=mysqli_query($mysql, "SELECT * FROM `users` WHERE `LOGIN`='$login' AND `PASSWORD`='$password'");
$row=$user.fetch_assoc();
if(count($row)==0){
    echo "Пользователь не найден";
    exit();
}

 
header('Location: logout.php');
 
?>