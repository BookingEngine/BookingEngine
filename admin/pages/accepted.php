<?php
session_start();

if (isset($_SESSION["admin"])) {
    $admin = $_SESSION["admin"];
} else {
    header("Location: ../login.php");
    session_destroy();
}

    // DATABSE CONNECTION
    include_once "../../settings/database/connection.php";
    $result = $conn->query("SELECT * FROM BebAccettate");
?>

<html>
<head>
    <title> In Sospeso | B&amp;B </title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../../stylesheets/style.css">
    <link rel="stylesheet" type="text/css" href="../../stylesheets/bootstrap-essentials.css">

    <script src="../../libraries/jquery-3.2.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<nav>
    <div class="extreme-left">
        <h1 class="brand">
            <a href="../dashboard.php">
                BookingEngine
            </a>
        </h1>
    </div>

    <p>&nbsp;</p>


    <div>
        <a class="yellow" href="suspended.php">In sospeso</a>
        <a class="green active" href="accepted.php">Accettate</a>
        <a class="blue" href="payed.php">Completati</a>
        <a class="red" href="denies.php">Rifiutate</a>
    </div>

    <div class="extreme-right" style="margin-left: auto">
        <a class="user">
            <img src="../../res/boy.png">
            <?php echo ucfirst($admin); ?>
        </a>
    </div>

    <div class="settings">
        <div class="flex">
            <a href="../logout.php">Logout</a>
        </div>
    </div>
</nav>
<ul class="list-group">
    <?php while ($row = $result->fetch_assoc()): ?>
        <li id="<?php echo 'ID-' . $row['id'] ?>" style="margin: 15px; width: 300px;" class="list-group-item">
            <?php
            foreach ($row as $key => $value):
                if ($key != 'id') {
                    echo "<span class='item'> <b>" . ucfirst($key) . "</b>: $value </span>  <br> ";
                }
            endforeach;
            ?>

            <div class="group-form">
                <button class="btn btn-danger" data-container="<?php echo 'ID-' . $row['id']; ?>" data-matricola="<?php echo $row['matricola']; ?>">
                    <a href="../requests/deny/_accept.php?input=<?php echo $row['matricola']; ?>&action=deny">
                        Rifiuta
                    </a>
                </button>
                <button class="btn btn-warning" data-container="<?php echo 'ID-' . $row['id']; ?>" data-matricola="<?php echo $row['matricola']; ?>">
                    <a href="../requests/suspend/_accept.php?input=<?php echo $row['matricola']; ?>&action=suspend">
                        Sospendi
                    </a>
                </button>
            </div>
        </li>
        <?php
    endwhile;
    $result->close();
    ?>
</ul>
</body>
</html>
