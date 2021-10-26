<?php


require_once 'connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$id = $_POST['ID'];
$body = $_POST['BODY'];

/*
 * Делаем запрос на добавление новой строки в таблицу comments
 */

mysqli_query($mysql, "INSERT INTO `comments` (`ID`, `book_id`, `BODY`) VALUES (NULL, '$id', '$body')");


header('Location:index.php?id=' . $id);