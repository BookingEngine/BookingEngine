<?php
/*
if (!isset($_SESSION["admin"])) {
        header("Location: login.php");
    }
*/

    include_once "../database.php";
    $result = $conn->query("SELECT * FROM Beb");

    if ( $result ) {
        $row = $result->fetch_assoc();
    }


?>

<html>
    <head>
        <title> Dashboard | B&amp;B </title>
        <?php include "../components/head.html"; ?>
        <link rel="stylesheet" href="../stylesheets/style.css">

        <script src="js/dashboard.js" crossorigin="anonymous"></script>

        <style>
            .group-form {
                /*width: 185px;
                padding: 12px;*/
                float: left;
            }
            form {
                display: inline;
            }
            * {
                outline: none;
            }
            input {
                margin: 30px 5px 30px 35px;
            }
        </style>
    </head>
    <body>

        <h1 align="center" style="margin: 50px !important;"> DASHBOARD </h1>
        <ul style="padding: 25px; display: flex; flex-flow: row wrap; justify-content: space-between;" class="list-group">
            <?php while ($row = $result->fetch_assoc()): ?>
                <li id="<?php echo 'ID-' . $row['id'] ?>" style="margin: 15px; width: 300px;" class="list-group-item">
                    <?php
                        foreach ($row as $key => $value):
                            if ($key != 'id') {
                                echo "<b>" . ucfirst($key) . "</b>: $value <br>";
                            }
                        endforeach;
                    ?>

                    <div class="group-form">
                        <input type="button" class="btn btn-success" data-container="<?php echo 'ID-' . $row['id']; ?>" data-matricola="<?php echo $row['matricola']; ?>" value="Accetta">
                        <input type="button" class="btn btn-danger" data-container="<?php echo 'ID-' . $row['id']; ?>" data-matricola="<?php echo $row['matricola']; ?>" value="Rifiuta">
                    </div>
                </li>
            <?php
                endwhile;
                $result->close();
            ?>
        </ul>
    </body>
</html>
