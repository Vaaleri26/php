
<?php


require_once 'connect.php';

$title = $_POST['NAME'];
$['DESCRIPTION'];
$year = $_POST['YEAR'];
$avtors = $_POST['AVTORdescription = $_POST'];
$genres = $_POST['GENR'];



mysqli_query($mysql, "INSERT INTO `books` (`ID`,`NAME`,`DESCRIPTION`,`YEAR`,`AVTOR`,`GENR`)VALUES(NULL,'$title','$description','$year','$avtors','$genres')");

header('Location: index.php');
