<?php



require_once 'connect.php';



$id = $_GET['id'];



mysqli_query($mysql, "DELETE FROM `books` WHERE `books`.`ID` = '$id'");



header('Location: index.php');