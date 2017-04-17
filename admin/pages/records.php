<?php
    include_once "../../settings/database/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#5B8886">
    <!-- / Meta tags -->

    <title> Management </title>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- jQuery Color -->
    <!-- BootStrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />

    <style media="screen">
      .panel {
        margin: 50px;
      }
      .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        vertical-align: middle !important;
      }
      a {
        color: #777;
        transition: color 0.25s;
        text-decoration: none !important;
      }

      a:hover {
        color: #ddd
      }

      .btn a {
        color: white;
      }

      .btn a:hover {
        color: white;
      }

    </style>
  </head>
  <body>

    <div class="panel panel-default">
      <div class="panel-heading">
        IN SOSPESO
      </div>
      <table class="table">
        <thead>
          <th> # </th>
          <th> First Name </th>
          <th> Last Name </th>
          <th> Email </th>
          <th> Phone Number </th>
          <th> Start </th>
          <th> End </th>
          <th> People </th>
          <th> Payement Method </th>
          <th> Order Number </th>
          <th> Action </th>
          <th> Action </th>
        </thead>
        <tbody>

          <?php
            $sospese = $conn->query("SELECT * FROM Beb");
            while( $row = $sospese->fetch_assoc() ):
          ?>
            <tr>
              <?php
              foreach ($row as $key => $value):
                if (isset($value) && $value != '' && $key != 'email') {
                  echo "<td> $value </td>";
                } else if ($key == 'email') {
                  echo "<td> <a href='mailto:$value'>$value</a> </td>";
                } else {
                  echo "<td> <b>- -</b> </td>";
                }
              endforeach;
              ?>
              <td>
                <button class="btn btn-success">
                  <a href="../requests/accept/_suspend.php?action=accept&id=<?php echo $row['matricola']; ?>">
                    Accept
                  </a>
                </button>
              </td>
              <td>
                <button class="btn btn-danger">
                  <a href="../requests/deny/_suspend.php?action=deny&id=<?php echo $row['matricola']; ?>">
                    Deny
                  </a>
                </button>
              </td>
            </tr>
          <?php
            endwhile;
            $sospese->close();
          ?>
        </tbody>
      </table>
    </div>

    <div class="panel panel-success">
      <div class="panel-heading">
        Accepted
      </div>
      <table class="table">
        <thead>
          <th> # </th>
          <th> First Name </th>
          <th> Last Name </th>
          <th> Email </th>
          <th> Phone Number </th>
          <th> Start </th>
          <th> End </th>
          <th> People </th>
          <th> Payement Method </th>
          <th> Order Number </th>
          <th> Action </th>
          <th> Action </th>

        </thead>
        <tbody>

          <?php
            $accettate = $conn->query("SELECT * FROM BebAccettate");
            while( $row = $accettate->fetch_assoc() ):
          ?>
            <tr>
              <?php
              foreach ($row as $key => $value):
                if (isset($value) && $value != '' && $key !== 'txn_id' && $key != 'email') {
                  echo "<td> $value </td>";
                } else if ($key == 'email') {
                  echo "<td> <a href='mailto:$value'>$value</a> </td>";
                } else if ($key == 'txn_id') {

                } else {
                  echo "<td> <b>- -</b> </td>";
                }
              endforeach;
              ?>
              <td>
                  <a href="../requests/suspend/_accept.php?input=<?php echo $matricola;?>&action=suspend">
                      <button class="btn btn-warning">
                          Suspend
                      </button>
                  </a>
              </td>
              <td>
                  <a href="../requests/deny/_accept.php?input=<?php echo $matricola;?>&action=suspend">
                      <button class="btn btn-danger">
                          Deny
                      </button>
                  </a>
              </td>
            </tr>
          <?php
            endwhile;
            $accettate->close();
          ?>
        </tbody>
      </table>
    </div>

    <div class="panel panel-danger">
      <div class="panel-heading">
        Denied
      </div>
      <table class="table">
        <thead>
          <th> # </th>
          <th> First Name </th>
          <th> Last Name </th>
          <th> Email </th>
          <th> Phone Number </th>
          <th> Start </th>
          <th> End </th>
          <th> People </th>
          <th> Payement Method </th>
          <th> Order Number </th>
          <th> Action </th>
          <th> Action </th>

        </thead>
        <tbody>

          <?php
            $rifiutate = $conn->query("SELECT * FROM BebRifiutate");
            while( $row = $rifiutate->fetch_assoc() ):
          ?>
            <tr>
              <?php
              foreach ($row as $key => $value):
                if (isset($value) && $value != '' && $key != 'email') {
                  echo "<td> $value </td>";
                } else if ($key == 'email') {
                  echo "<td> <a href='mailto:$value'>$value</a> </td>";
                } else {
                  echo "<td> <b>- -</b> </td>";
                }
              endforeach;
              ?>
              <td>
                  <a href="../requests/accept/_deny.php?input=<?php echo $matricola;?>&action=suspend">
                      <button class="btn btn-danger">
                          Accept
                      </button>
                  </a>
              </td>
              <td>
                  <a href="../requests/suspend/_deny.php?input=<?php echo $matricola;?>&action=suspend">
                      <button class="btn btn-warning">
                          Suspend
                      </button>
                  </a>
              </td>
            </tr>
          <?php
            endwhile;
            $rifiutate->close();
          ?>
        </tbody>
      </table>
    </div>

    <div class="panel panel-info">
      <div class="panel-heading">
        Completed
      </div>
      <table class="table">
        <thead>
          <th> # </th>
          <th> First Name </th>
          <th> Last Name </th>
          <th> Email </th>
          <th> Phone Number </th>
          <th> Start </th>
          <th> End </th>
          <th> People </th>
          <th> Payement Method </th>
          <th> Order Number </th>
          <th> Transition ID </th>
        </thead>
        <tbody>

          <?php
            $completate = $conn->query("SELECT * FROM BebPagate");
            while( $row = $completate->fetch_assoc() ):
          ?>
            <tr>
              <?php
              foreach ($row as $key => $value):
                if (isset($value) && $value != '' && $key != 'email') {
                  echo "<td> $value </td>";
                } else if ($key == 'email') {
                  echo "<td> <a href='mailto:$value'>$value</a> </td>";
                } else if ($key == 'txn_id') {
                  echo "<td> <b> $value </b> </td>";
                } else {
                  echo "<td> <b>- -</b> </td>";
                }
              endforeach;
              ?>
            </tr>
          <?php
            endwhile;
            $completate->close();
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
