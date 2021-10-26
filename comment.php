<?php

    

    require_once 'connect.php';



    $book_id = $_GET['id'];

  
    $book = mysqli_query($mysql, "SELECT * FROM `books` WHERE `ID` = '$book_id'");


    $book = mysqli_fetch_assoc($book);

    /*
     * Делаем выборку всех строк комментариев с полученным ID книги выше
     */

    $comments = mysqli_query($mysql, "SELECT * FROM `comments` WHERE `book_id` = '$book_id'");

    

    $comments = mysqli_fetch_all($comments);
?>

<!doctype html>
<html lang="en">
<head>
    <title>book</title>
</head>
<body>
    <h2>NAME: <?= $book['NAME'] ?></h2>
    <p>DESCRIPTION: <?= $book['DESCRIPTION'] ?></p>
    <p>YEAR: <?= $book['YEAR'] ?></p>
    <p>AVTOR: <?= $book['AVTOR'] ?></p>
    <p>GENR: <?= $book['GENR'] ?></p>
    <hr>

    <h3>Add comment</h3>
    <form action="comment2.php" method="post">
        <input type="hidden" name="ID" value="<?= $book['ID'] ?>">
        <textarea name="BODY"></textarea> <br><br>
        <button type="submit">Add comment</button>
    </form>

    <hr>

    <h3>Comments</h3>
    <ul>
        <?php

            /*
             * Перебираем массив с комментариями и выводим
             */

            foreach ($comments as $comment) {
            ?>
                <li><?= $comment[2] ?></li>
            <?php
            }
        ?>
    </ul>
</body>
</html>