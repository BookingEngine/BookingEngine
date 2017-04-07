<?php
    function redirect($page) {
        $p = trim($page)
            header("Location: $p");
    }

    session_start();
    if ( isset($_SESSION["admin"]) && !empty($_SESSION["admin"])):
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">B&amp;B</a>
    <div class="navbar-header navbar-right">
        <ul class="nav navbar-nav">
          <li class="navbar-left">
            <a href="admin/dashboard.php"> Gestione </a>
          </li>
          <li class="navbar-right">
            <a href="user/prenota.php"> Prenota </a>
          </li>
        </ul>
    </div>
  </div>
</nav>

<?php else: ?>
    redirect("admin/dashboard.php");
<?php endif; ?>
