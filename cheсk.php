<?php
require_once 'connect.php';
$login=filter_var(trim($_POST['LOGIN']),FILTER_SANITIZE_STRING);
$email=filter_var(trim($_POST['EMAIL']),FILTER_SANITIZE_STRING);
$password=filter_var(trim($_POST['PASSWORD']),FILTER_SANITIZE_STRING);



if(trim($login)==''){
  //  echo "Укажите логин";
  $_SESSION['errorLogin']="ERROR:Укажите логин";
  header("Location: http://lab2.ru/logout.php");
  exit();
    
}
if(trim($email)==''){
    $_SESSION['errorLogin']="ERROR:Укажите email";
    header("Location: http://lab2.ru/logout.php");
    exit();
      
  
}
if(trim($password)==''){
    
        $_SESSION['errorLogin']="ERROR:Укажите пароль";
        header("Location: http://lab2.ru/logout.php");
        exit();
          
      
    }
    
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['errorLogin']="ERROR:Неккортектно введен email";
    header("Location: http://lab2.ru/logout.php");
    exit();
}
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);

if(!$uppercase || !$lowercase || !$number || strlen($password) < 5) {
    $_SESSION['errorLogin']="ERROR:Пароль должен содержать латиницу верхнего и нижнего регистра,цифры,а также иметь длину не менее пяти символов";
    header("Location: http://lab2.ru/logout.php");
    exit();
}

$result=mysqli_query($mysql,"SELECT * FROM `users` WHERE 'LOGIN'=$login");

if(mysqli_num_rows($result)>0){
    $_SESSION['errorLogin']="ERROR:Такой логин уже существует";
    header("Location: http://lab2.ru/logout.php");
    exit();
}


mysqli_query($mysql, "INSERT INTO `users` (`ID`,`LOGIN`,`EMAIL`,`PASSWORD`)VALUES(NULL,'$login','$email','$password')");
header('Location: signup.php');
?>

