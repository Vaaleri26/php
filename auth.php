<?php
$login=filter_var(trim($_POST['LOGIN']),FILTER_SANITIZE_STRING);

$password=filter_var(trim($_POST['PASSWORD']),FILTER_SANITIZE_STRING);

require_once 'connect.php';
$users=mysqli_query($mysql, "SELECT * FROM `users` WHERE `LOGIN`='$login' AND `PASSWORD`='$password'");


if(mysqli_num_rows($user)>0){
$users=myscli_fetch_assoc($user);

$_SESSION['user'] = [
"ID" => $user['ID'],
"LOGIN"=>$user['LOGIN'],
"EMAIL"=>$user['EMAIL'],
"PASSWORD"=>$user['PASSWORD']
];

}


header('Location: signup.php');
