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
            <div class="flex left-part" style="flex-grow: 5">
                <aside class="hotel">
                    <div class="img" style="background-image: url(https://source.unsplash.com/category/buildings/?hotel)"></div>
                    <h1>Hotel example</h1>
                    <p>Example street</p>
                    <p>Washington DC, 88059</p>
                    <p>USA</p>
                    <p style="text-align: center"><button name="send-email">Send Email</button></p>
                </aside>
                <aside class="user">
                    <div class="img flex" style="align-items: center; justify-content:center">
                        <svg enable-background="new 0 0 50 50" height="50px" id="Layer_1" version="1.1" viewBox="0 0 50 50" width="50px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><circle cx="25" cy="25" fill="none" r="24" stroke="#000000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"/><rect fill="none" height="50" width="50"/><path d="M29.933,35.528c-0.146-1.612-0.09-2.737-0.09-4.21c0.73-0.383,2.038-2.825,2.259-4.888c0.574-0.047,1.479-0.607,1.744-2.818  c0.143-1.187-0.425-1.855-0.771-2.065c0.934-2.809,2.874-11.499-3.588-12.397c-0.665-1.168-2.368-1.759-4.581-1.759  c-8.854,0.163-9.922,6.686-7.981,14.156c-0.345,0.21-0.913,0.878-0.771,2.065c0.266,2.211,1.17,2.771,1.744,2.818  c0.22,2.062,1.58,4.505,2.312,4.888c0,1.473,0.055,2.598-0.091,4.21c-1.261,3.39-7.737,3.655-11.473,6.924  c3.906,3.933,10.236,6.746,16.916,6.746s14.532-5.274,15.839-6.713C37.688,39.186,31.197,38.93,29.933,35.528z"/></svg>
                    </div>
                    <h1>john.doe@example.com</h1>
                    <p>John Doe</p>
                    <p style="text-align: center"><button name="logout">Logout</button><
                </aside>
            </div>
            <div class="flex center-part">
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
                            <input type="checkbox" name="pay" placeholder="Guest payed" style="width: auto">
                        </div>
                        <div class="button">
                            <button name="booking" type="submit">Booking</button>
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