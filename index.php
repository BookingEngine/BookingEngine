<?php
    session_start();
    if (isset($_SESSION["admin"])):
        header("Location: admin/dashboard.php");
    else:
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Home | CHOOSE </title>
        <?php include "components/head.html"; ?>
        <link rel="stylesheet" href="stylesheets/style.css">
    </head>
    <body>
        <div class="container">
            <div class="center-item">
                <button class="btn btn-primary">
                    <a href="admin/dashboard.php" >Pannello di controllo</a>
                </button>
                <button class="btn btn-primary">
                    <a href="user/prenota.php"> Prenotare </a>
                </button>
            </div>
        </div>
    </body>
</html>

<?php endif; ?>