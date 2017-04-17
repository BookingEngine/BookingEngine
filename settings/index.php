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
    <form class="form ten columns" action="config/setup.php" method="POST" id="login[form]">
        <div class="row">
            <div class="six columns">
                <label> Admin Email: </label>
                <input type="email" name="a_email" placeholder="Admin Email" class="u-full-width">
            </div>
            <div class="six columns">
                <label> Admin Password: </label>
                <input type="password" name="a_password" placeholder="Admin Password" class="u-full-width">
            </div>
        </div>

        <br>

        <label> Tables Names: </label>
        <input type="text" name="tb_accepted" placeholder="Accepted" class="u-full-width">
        <input type="text" name="tb_suspended" placeholder="Suspended" class="u-full-width">
        <input type="text" name="tb_denied" placeholder="Denied" class="u-full-width">
        <input type="text" name="tb_completed" placeholder="Completed" class="u-full-width">
        <input type="text" name="tb_login" placeholder="Login" class="u-full-width">

        <br>
        <br>

        <label> Database Configuration: </label>
        <input type="text" name="db_host" placeholder="Host" class="u-full-width">
        <input type="text" name="db_name" placeholder="Name" class="u-full-width">
        <input type="number" size="4" name="db_port" placeholder="Port" class="u-full-width">
        <input type="text" name="db_user" placeholder="Username" class="u-full-width">
        <input type="password" name="db_pass" placeholder="Password" class="u-full-width">

        <br>

        <div class="u-pull-right">
            <input type="submit" name="submit" value="Save" class="button">
        </div>

    </form>
</body>
</html>