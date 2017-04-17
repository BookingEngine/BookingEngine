<html>
  <head>
      <title> Prenotations | B&amp;B </title>
      <meta name="viewport" content="width=device-width">

      <link rel="stylesheet" href="../css/normalize.css">
      <link rel="stylesheet" href="../css/skeleton.css">
      <link rel="stylesheet" href="../css/main.css">

      <script src="https://code.jquery.com/jquery-1.11.2.js"></script>

      <style>
          .form {  margin: 0px !important;  }
      </style>
  </head>
  <body>

    <?php if (isset($_GET["sent"])): ?>

        <?php $status = $_GET["status"]; $msg = $_GET["msg"]; ?>

        <div class="alert <?php echo $status ?>">
            <?php echo $msg; ?>
        </div>
    <?php endif; ?>

    <form class="form center ten columns" action="helpers/processor.php" class="form center" method="post">
      <div class="row">
        <div class="six columns">
          <label for="customerName" class="required">Name: </label>
          <input class="u-full-width" name="customer_name" placeholder="John" type="text" id="customerName">
        </div>
        <div class="six columns">
          <label for="customerSurname" class="required">Surname: </label>
          <input type="text" id="customerSurname" name="customer_surname" class="u-full-width" placeholder="Doe">
        </div>
      </div>
      <label for="customerMail" class="required">Email: </label>
      <input type="email" id="customerMail"class="u-full-width"  name="customer_email" placeholder="jdoe@gmail.com">

        <div class="row">
            <div class="six columns">
                <label for="people" class="required">N. People: </label>
                <input type="number" id="people" class="u-full-width" name="customer_people" placeholder="3" min="1" max="5">
            </div>
            <div class="six columns">
                <label for="tel" class="required">Phone Number: </label>
                <input type="tel" id="tel" class="u-full-width" name="customer_tel" placeholder="+39 386 6457 998">
            </div>
        </div>

      <div class="row">
        <div class="six columns">
          <label for="start" class="required">Arrive: </label>
          <input type="date" id="start" min="<?php echo date('Y-m-d', strtotime('+1 week')); ?>" max="<?php echo date('Y-m-d', strtotime('+1 year')) ?>" name="start" class="u-full-width">
        </div>
        <div class="six columns">
          <label for="end" class="required">Leave: </label>
          <input type="date" id="end" min="<?php echo date('Y-m-d', strtotime('+1 week')); ?>" max="<?php echo date('Y-m-d', strtotime('+1 year')); ?>" name="end" class="u-full-width">
        </div>
      </div>

      <label for="payment" class="required">Payment: </label>
      <select class="u-full-width" name="payment">
        <option value="false" disabled selected>Payment Method</option>
        <option value="paypal">Paypal</option>
        <option value="bonifico">Bonifico</option>
      </select>
      <label for="note">Note: </label>
      <textarea style="max-width: 100%;" name="note" id="note" class="u-full-width"></textarea>


        <input type="submit" name="submit" value="Submit" class="button-success u-pull-right">
        <input type="reset" class="button-warn u-pull-right" value="Reset">
    </form>
  </body>
</html>
