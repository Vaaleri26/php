<?php require_once 'connect.php';?>
<DOCTYPE html!>
  <html>
    <head>
      <meta charset-utf-8>
      <title>php</title>
      <link rel="stylesheet" href="style.css" />
      <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF"
      crossorigin="anonymous"/>
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
      <div class="container mt-4">
      <div class="row">
      <div class="col">
      <form action="check.php" method="POST"> 
          <input type="text" class="form-control" name ="LOGIN"
          id="LOGIN" placeholder="Введите логин"><br><br>
          <input type="text" class="form-control" name ="EMAIL"
          id="EMAIL" placeholder="Введите email"><br><br>
          <input type="password" class="form-control" name ="PASSWORD"
          id="PASSWORD" placeholder="Введите пароль"><br><br>
           <button type="submit">Зарегистрироваться</button>
</form>
<?php
    if(array_key_exists("errorLogin", $_SESSION))
    {
        echo '<p class="message">' . $_SESSION['errorLogin'] . '</p>';
        unset($_SESSION['errorLogin']);
    }
    ?>
</div>
<div class="col"
      <form action="auth.php" method="POST"> 
          <input type="text" class="form-control" name ="LOGIN"
          id="LOGIN" placeholder="Введите логин"><br><br>
          
          <input type="password" class="form-control" name ="PASSWORD"
          id="PASSWORD" placeholder="Введите пароль"><br><br>
          <input type="checkbox" name="REMEMBER"/>Запомнить</br>
           <button type="submit">Авторизоваться</button>
</form>
</div></div></div>
</body>
</html>