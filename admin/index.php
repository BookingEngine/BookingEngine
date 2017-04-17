<?php
    session_start();
    include_once "../settings/connection.php";
    include_once "../libraries/functions.php";

    if (isset($_SESSION["admin"])) {
        $user = ucfirst($_SESSION["admin"]);
    } else {
        header("Location: login.php");
    }

    $next_week = week_counter();
    $tomorrow = date('Y-m-d', strtotime("+1 day"));

    $tb_accepted = $tables["accepted"];
    $tb_suspended = $tables["suspended"];
    $tb_denied = $tables["denied"];
    $tb_completed = $tables["completed"];
?>

<!DOCTYPE>
<html>
    <header>
        <title>Dashboard  - BookingEngine</title>

        <meta name="viewport" content="width=device-width">
        <meta name="theme-color" content="#fff">
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet">

        <link rel="stylesheet" href="../stylesheets/nav.css">
        <link rel="stylesheet" href="../stylesheets/page.css">
    </header>
    <body>
        <nav class="flex">
            <h1 class="padding-left">BookingEngine</h1>
            <div>
                <a href="#">Suspended</a>
                <a href="#">Accepted</a>
                <a href="#">Completed</a>
                <a href="#">Denied</a>
            </div>
            <form>
                <select name="for">
                    <option value="matricola" selected="selected">Matricola</option>
                    <option value="surname">Surname</option>
                    <option value="email">Email</option>
                    <option value="tel">Telephone</option>
                </select>
                <input type="text" name="search" placeholder="Search">
            </form>
            <section class="account">
                <h2>Filippo.cozzini</h2>
            </section>
        </nav>

        <main class="flex" style="align-items: flex-start">
            <aside class="hotel">
                <div class="img" style="background-image: url(https://source.unsplash.com/category/buildings/?hotel)"></div>
                <h1>Hotel example</h1>
                <p>Example street</p>
                <p>Washington DC, 88059</p>
                <p>USA</p>
                <p style="text-align: center"><button name="send-email">Send Email</button></p>
            </aside>
            <div class="flex">
                <article class="search">
                    <form>
                        <select name="for">
                            <option value="matricola" selected="selected">Matricola</option>
                            <option value="surname">Surname</option>
                            <option value="email">Email</option>
                            <option value="tel">Telephone</option>
                        </select>
                        <input type="text" name="search" placeholder="Search">
                    </form>
                </article>
                <section class="insert">
                    <h1>Insert a manual booking</h1>
                    <form class="flex">
                        <div class="identity">
                            <h1>Identity</h1>
                            <label>Name:</label>
                            <input type="text" name="name" placeholder="Guest name" required>
                            <label>Surname:</label>
                            <input type="text" name="surname" placeholder="Guest surname" required>
                        </div>
                        <div class="contacts">
                            <h1>Contacts</h1>
                            <label>Email:</label>
                            <input type="email" name="email" placeholder="Guest email" required>
                            <label>Telephone:</label>
                            <input type="tel" name="tel" placeholder="Guest telephone" required>
                        </div>
                        <div class="guests">
                            <h1>Guests</h1>
                            <label>Adult:</label>
                            <input type="number" name="adult" placeholder="Adult guests" required>
                            <label>Children:</label>
                            <input type="number" name="child" placeholder="Children guests" required>
                        </div>
                        <div class="dates">
                            <h1>Dates</h1>
                            <label>Arrive:</label>
                            <input type="datetime-local" name="start" placeholder="Guest arrive" required>
                            <label>Departure:</label>
                            <input type="datetime-local" name="end" placeholder="Guest departure" required>
                        </div>
                        <div class="status"> 
                            <h1>Payment</h1>
                            <label>Grand total:</label>
                            <input type="number" name="amount" placeholder="Grand total" required>
                            <label>Pay:</label>
                            <input type="checkbox" name="pay" placeholder="Guest payed">
                        </div>
                        <div class="button">
                            <button name="booking" type="submit">Booking</button>
                            <br>
                            <button id="clear" type="reset">Clear all</button>
                        </div>
                    </form>
                </section>
            </div>
            <section class="summary">
                <h1>Summary</h1>
                <div class="suspended">
                    <h1>Request suspended</h1>
                    <h2>0</h2>
                </div>
                <div class="accepted">
                    <h1>Request accepted</h1>
                    <h2>11</h2>
                </div>
                <div class="completed">
                    <h1>Request completed</h1>
                    <h2>4</h2>
                </div>
                <div class="denied">
                    <h1>Request denied</h1>
                    <h2>1</h2>
                </div>
            </section>
        </main>
    </body>
</html>