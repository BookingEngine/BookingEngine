<?php
    include_once "../settings/config/config.php";

    function clean_inp($v) {
        $clean = explode("%", $v);

        if ( count($clean) == 2 || count($clean) == 3 ) {
            return explode("%", $v)[1];
        } else {
            return $v;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> First run | BookingEngine </title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="stylesheet" href="../css/main.css">

    <style> html {overflow: hidden; }</style>
</head>
<body>
<form class="form ten columns" action="helpers/setup.php" method="POST" id="login[form]">
    <div class="row">
        <div class="six columns">
            <label> Admin Email: </label>
            <input type="email" placeholder="<?php echo clean_inp($ad_email); ?>" name="a_email" class="u-full-width">
        </div>
        <div class="six columns">
            <label> Admin Password: </label>
            <input type="password" placeholder="<?php echo clean_inp($ad_password);?>" name="a_password" class="u-full-width">
        </div>
    </div>

    <br>

    <label> Tables Names: </label>
    <input placeholder="<?php echo clean_inp($tb_accepted);?>" type="text" name="tb_accepted" class="u-full-width">
    <input placeholder="<?php echo clean_inp($tb_suspended);?>" type="text" name="tb_suspended" class="u-full-width">
    <input placeholder="<?php echo clean_inp($tb_denied);?>" type="text" name="tb_denied" class="u-full-width">
    <input placeholder="<?php echo clean_inp($tb_completed);?>" type="text" name="tb_completed" class="u-full-width">
    <input placeholder="<?php echo clean_inp($tb_login);?>" type="text" name="tb_login" class="u-full-width">

    <br>
    <br>

    <label> Database Configuration: </label>
    <input type="text" placeholder="<?php echo clean_inp($dbhost);?>" name="db_host" class="u-full-width">
    <input type="text" placeholder="<?php echo clean_inp($dbname);?>"name="db_name" class="u-full-width">
    <input type="number" placeholder="<?php echo clean_inp($dbport);?>" size="4" name="db_port" class="u-full-width">
    <input type="text" placeholder="<?php echo clean_inp($dbuser);?>" name="db_user" class="u-full-width">
    <input type="password" placeholder="<?php echo clean_inp($dbpass);?>" name="db_pass" class="u-full-width">

    <br>

    <div class="u-pull-right">
        <input type="submit" name="submit" value="Save" class="button-success u-pull-right">
        <input type="reset" class="button-warn u-pull-right" value="Restore Defaults">
    </div>

</form>
</body>
</html>
