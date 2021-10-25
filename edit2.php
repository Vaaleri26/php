<?php



require_once 'connect.php';



$id = $_POST['ID'];
$title = $_POST['NAME'];
$description = $_POST['DESCRIPTION'];
$year = $_POST['YEAR'];
$avtors = $_POST['AVTOR'];
$genres = $_POST['GENR'];


mysqli_query($mysql, "UPDATE `books` SET `NAME` = '$title',  `DESCRIPTION` = '$description',`YEAR` = '$year',`AVTOR` = '$avtors',`GENR` = '$genres' WHERE `books`.`ID` = '$id'");



header('Location:index.php');?>