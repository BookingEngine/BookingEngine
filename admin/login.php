<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Home | B&amp;B </title>
        <?php include "../components/head.html"; ?>
        <link rel="stylesheet" href="../stylesheets/style.css">
    </head>
    <body>
        <div class="container">
            <h1 align="center" class="title">Accesso</h1>
            <form action="helpers/checklogin.php" class="form center">
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>