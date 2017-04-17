<?php
  include_once "../database/connection.php";
  $sql = "SELECT * FROM BebSettings WHERE id=10";
  $result = $conn->query($sql);
  if (isset($result) && $result) {
    $row = $result->fetch_assoc();
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Settings | BookingEngine </title>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/css/mdb.min.css"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/js/mdb.min.js"></script> -->

    <script src="settings/index.js"></script>

    <style>
      .hidden {
        display: none;
      }
    </style>
</head>

<body>
<form action="settings/settings.php" method="post" class="form center-item">
    <div id="cat0" name="admin" class="category">
        <div class="form-group">
            <label>Admin Email: </label>
            <input value="<?php echo $row["adminMail"]; ?>" class="form-control" type="text" name="adminMail" placeholder="jdoe@doefam.com">
        </div>
        <div class="form-group">
            <label>Admin Password: </label>
            <input value="<?php echo $row["adminPass"]; ?>" class="form-control" type="password" name="adminPassword" placeholder="*******">
        </div>
        <div class="form-group">
            <label>Admin Name: </label>
            <input value="<?php echo $row["adminName"]; ?>" class="form-control" type="text" name="adminName" placeholder="John">
        </div>
        <span class="btn btn-info" id="to1">
            NEXT
        </span>
    </div>


    <div id="cat1" name="database" class="hidden category">
        <div class="form-group">
            <label>Database Host: </label>
            <input value="<?php echo $row["dbHost"]; ?>" class="form-control" type="text" name="dbHost" placeholder="localhost">
        </div>
        <div class="form-group">
            <label>Database Name: </label>
            <input value="<?php echo $row["dbName"]; ?>" class="form-control" type="text" name="dbName" placeholder="sql123456">
        </div>
        <div class="form-group">
            <label>Database Username: </label>
            <input value="<?php echo $row["dbUser"]; ?>" class="form-control" type="text" name="dbUser" placeholder="root">
        </div>
        <div class="form-group">
            <label>Database Password: </label>
            <input value="<?php echo $row["dbPass"]; ?>" class="form-control" type="password" name="dbPass" placeholder="*******">
        </div>
        <div class="form-group">
            <label>Database Port: </label>
            <input value="<?php echo $row["dbPort"]; ?>" class="form-control" type="text" name="dbPort" placeholder="3306">
        </div>
        <span id="back0" class="btn btn-warning">
            BACK
        </span>
        <span  id="to2" class="btn btn-info">
            NEXT
        </span>
    </div>

    <div id="cat2" name="activity" class="hidden category">
        <div class="form-group">
            <label>Activity Name: </label>
            <input value="<?php echo $row["activityName"]; ?>" class="form-control" type="text" placeholder="John's B&amp;B" name="activityName">
        </div>
        <div class="form-group">
            <label>Activity: </label>
            <input value="<?php echo $row["activityMail"]; ?>" class="form-control" type="email" placeholder="support@johnbed.com" name="activityEmail">
        </div>
        <div class="form-group">
            <label>Activity Phone Number: </label>
            <input value="<?php echo $row["activityPhone"]; ?>" class="form-control" type="text" placeholder="+41 685 749 8857" name="activityPhone">
        </div>
        <span id="back1" class="btn btn-warning" >
            BACK
        </span>
        <span id="to3" class="btn btn-info">
            NEXT
        </span>
    </div>

    <div id="cat3" name="payements" class="hidden category">
        <div class="form-group">
            <label>Payemeny Method: </label>

            <div class="checkbox">
                <label>
                    <input type="checkbox" value="true" name="paypal"> Paypal
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" value="true" name="bonifico"> Bonifico
                </label>
            </div>
        </div>
        <span id="back2" class="btn btn-warning">
            BACK
        </span>
        <input class="btn btn-success" type="submit" name="submit">
    </div>

</form>

</body>
</html>
