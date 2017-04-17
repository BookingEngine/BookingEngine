<?php session_destroy() ?>

<!DOCTYPE>
<html>
  <header>
      <meta name="viewport" content="width=device-width">
      <meta name="theme-color" content="#fff">

      <title>Log In  - BookingEngine</title>
      <link rel="stylesheet" href="../css/normalize.css">
      <link rel="stylesheet" href="../css/skeleton.css">
      <link rel="stylesheet" href="../css/nav.css">
      <link rel="stylesheet" href="../css/main.css">
  </header>
  <body>
    <nav class="navbar">
      <div class="brand">
        <a href="../index.php"> BookingEngine </a>
      </div>
    </nav>

    <h2 id="login[title]" class="title" align="center"> Log In </h2>
    <form class="form" action="helpers/checklogin.php" method="POST" id="login[form]">
      <label> Email: </label>
      <input type="email" name="loginEmail" placeholder="Admin Email" class="u-full-width">


      <label> Password: </label>
      <input type="password" name="loginPass" placeholder="Admin Password" class="u-full-width">
      <div class="u-pull-right">
        <input type="submit" name="submit" class="button-primary">
      </div>
    </form>
  </body>
</html>
