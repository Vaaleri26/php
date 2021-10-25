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
          <li><a href="#">BOOKS</a></li>
          <li><a href="indexgenr.php">GENRES</a></li>
          <li><a href="indexavtor.php">AVTORS</a></li>
          <li><a href="query.php">QUERIES</a></li>
          <li><a href="logout.php">LOGOUT</a></li>
        </ul>
      </header>
      <h6>->/5SEMESTER/LOGIN.PHP->/5SEMESTER/LOGIN.PHP->/5SEMESTER/ADDBOOK.PHP</h6>
      
          <form action="addbook.php" method="POST" class="add"> 
          <input name="NAME" type="text" placeholder="Tittle">
          <input name="DESCRIPTION" type="text" placeholder="Description">
          <input name="YEAR" type="text" placeholder="YYYY">

          <select name="GENR">
            <?php
            require_once "connect.php";
            $book=mysqli_query($mysql,"select ID,NAME from genres") ;
            while ($row = $book -> fetch_assoc()){
                        echo'
                        <option value="'.$row['ID'].'">
                          '.$row['NAME'].'
                        </option>';
                      }       
                      ?>
          </select>

          <select name="AVTOR">
          <?php
            
            $book=mysqli_query($mysql,"select ID,NAME from avtors") ;
            while ($row = $book -> fetch_assoc()){
                        echo'
                        <option value="'.$row['ID'].'">
                          '.$row['NAME'].'
                        </option>';
                      }       
                      ?>
            </select>

            <button>
            Add
          </button>
          </form>
        

<center>DATABASE CONNECTION ESTABLISHED!</center>
  <?php
  
  echo'
  
    <table>
    <thead>
      <tr>               
        <th>ID book</th>
        <th>Title of the book</th>
        <th>Description</th>
        <th>Date write</th>
        <th>Avtor</th>
        <th>Genre</th>
        <th>Delete</th>
        <th>Edit</th>
        <th>Comments</th>   
      </tr>                     
    </thead>        
      <tbody>';     ?>
      <?php

     
      $books = mysqli_query($mysql, "SELECT `books`.`ID`,`books`.`NAME`,`books`.`DESCRIPTION`,`books`.`YEAR`,`avtors`.`NAME`,`genres`.`NAME`, avtors.ID, genres.ID FROM `books` INNER JOIN `avtors` ON `avtors`.`ID`=`books`.`AVTOR` INNER JOIN `genres` ON `genres`.`ID`=`books`.`GENR`");

    

      $books = mysqli_fetch_all($books);


      foreach ($books as $book) {
          ?>
              <tr>
                  <th><?= $book[0] ?></th>
                  <th><?= $book[1] ?></th>
                  <th><?= $book[2] ?></th>
                  <th><?= $book[3] ?></th>
                  <th><?= $book[4] ?></th>
                  <th><?= $book[5] ?></th>
                  <th><a style="color: black;" href="deletebook.php?id=<?= $book[0] ?>">Delete</a></th>
                  <th><a style="color: black;" href="edit.php?id=<?= $book[0] ?>&avtor_id=<?= $book[6]?>&genr_id=<?= $book[7]?>">Edit</a></th>
        
                  
              </tr>
          <?php
      }
  ?>
  
    </body>
  </html>