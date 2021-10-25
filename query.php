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
          <li><a href="indexgenr.php">GENRES</a></li>
          <li><a href="indexavtor.php">AVTORS</a></li>
          <li><a href="">QUERIES</a></li>
          <li><a href="#">LOGOUT</a></li>
        </ul>
      </header>
      <h6>->/5SEMESTER/LOGIN.PHP->/5SEMESTER/LOGIN.PHP->/5SEMESTER/ADDBOOK.PHP</h6>
      
          <form action="" method="POST" class="query"> 
          <select name="Avtors">
          <?php
            require_once "connect.php";
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
            Filtration
          </button>
          </form>
        

        <center>DATABASE CONNECTION ESTABLISHED!</center>
          <?php
          require_once "connect.php";
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
                  
              </tr>                     
            </thead>        
              <tbody>';     ?>
              <?php
        
           
              $books = mysqli_query($mysql, "SELECT * FROM `books`");
        
             
              $books = mysqli_fetch_all($books); 
              
                                foreach ($books as $book) {
      if ($_POST['Avtors'] ==$book[4]){ ?>
                      <tr>
                          <th><?= $book[0] ?></th>
                          <th><?= $book[1] ?></th>
                          <th><?= $book[2] ?></th>
                          <th><?= $book[3] ?></th>
                          <th><?= $book[4] ?></th>
                          <th><?= $book[5] ?></th>
                          <th><a style="color: black;" href="deletebook.php?id=<?= $book[0] ?>">Delete</a></th>
                          <th><a style="color: black;" href="edit.php?id=<?= $book[0] ?>">Edit</a></th>
                          
                      </tr> 
                      
                      <?php 

                    }
      elseif($_POST['Avtors'] ==NULL){?>
        <tr>
                          <th><?= $book[0] ?></th>
                          <th><?= $book[1] ?></th>
                          <th><?= $book[2] ?></th>
                          <th><?= $book[3] ?></th>
                          <th><?= $book[4] ?></th>
                          <th><?= $book[5] ?></th>
                          <th><a style="color: black;" href="deletebook.php?id=<?= $book[0] ?>">Delete</a></th>
                          <th><a style="color: black;" href="edit.php?id=<?= $book[0] ?>">Edit</a></th>
                          
                      </tr> <?php
                      };
              };
            
          ?>
              
        
              
        

            </body>
          </html>