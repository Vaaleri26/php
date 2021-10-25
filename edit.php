<?php

   

    require_once 'connect.php';



    $book_id = $_GET['id'];

    

    $book = mysqli_query($mysql, "SELECT * FROM `books` WHERE `ID` = '$book_id'");

    

    $book = mysqli_fetch_assoc($book);
?>
<DOCTYPE html!>
  <html>
    <head>
      <meta charset-utf-8>
      <title>php</title>
      <link rel="stylesheet" href="style.css" />
    </head>

    <body>

      <header>
        <h1>LIBRARY</h1>
        <ul class="menu-main">
          <li><a href="index.php">BOOKS</a></li>
          <li><a href="#indexgenr.php">GENRES</a></li>
          <li><a href="indexavtor.php">AVTORS</a></li>
          <li><a href="query.php">QUERIES</a></li>
          <li><a href="#">LOGOUT</a></li>
        </ul>
      </header>
      <h6>->/5SEMESTER/LOGIN.PHP->/5SEMESTER/LOGIN.PHP->/5SEMESTER/ADDBOOK.PHP</h6>
      
    

        <form action="edit2.php" method="POST" class="edit"> 
        <input type="hidden" name="ID" value="<?= $book['ID'] ?>">
          <input name="NAME" type="text" value="<?= $book['NAME'] ?>">
          <input name="DESCRIPTION" type="text" value="<?= $book['DESCRIPTION'] ?>">
          <input name="YEAR" type="text" value="<?= $book['YEAR'] ?>">
        
    

          <select name="GENR">
            <?php
           
            $book=mysqli_query($mysql,"select ID,NAME from genres") ;
            while ($row = $book -> fetch_assoc()){
              if ($row['ID'] == $_GET['genr_id']){
                        echo'
                        <option selected value="'.$row['ID'].'">
                          '.$row['NAME'].'
                        </option>';
                      }       
                      else{
                        echo'
                        <option value="'.$row['ID'].'">
                        '.$row['NAME'].'
                        </option>';
                        }
                      }
                        ?>
          </select>

          <select name="AVTOR">
          <?php
            
            $book=mysqli_query($mysql,"select ID,NAME from avtors") ;
            while ($row = $book -> fetch_assoc()){
              if ($row['ID'] == $_GET['avtor_id']){
                        echo'
                        <option  selected value="'.$row['ID'].'">
                          '.$row['NAME'].'
                        </option>';
                      }       
                      else{
                        echo'
                        <option value="'.$row['ID'].'">
                        '.$row['NAME'].'
                        </option>';
                        }
                      }
                      ?>
            </select>

            <button type="submit">Edit</button>
          </form>
        

                    </body>
                    </html>