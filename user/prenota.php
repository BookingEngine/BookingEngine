<html>
    <head>
        <title> Prenota | B&amp;B </title>
        <link rel="stylesheet" href="../stylesheets/style.css">
        <?php include_once "../components/head.html"; ?>

        <style>
            .sub-label {
                float: right;
            }
            select {
                width: 300px;
            }
            * {
                outline: none;
            }

            .req {
                color: red;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <form method="POST" action="helpers/processor.php" class="form center">
            <div class="form-group">
                <label for="name">Nome<span class="req">*</span></label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="surname">Cognome<span class="req">*</span></label>
                <input type="text" class="form-control" name="surname">
            </div>
            <div class="form-group">
                <label for="email">Email<span class="req">*</span></label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="tel">Telefono<span class="req">*</span></label>
                <input type="text" class="form-control" name="tel">
            </div>
            <div class="form-group">
                <label for="start end">Periodo prenotazione<span class="req">*</span></label> <br>
                <span class="sub-label">Arrivo</span> <br>
                <input type="date" min="<?php echo date('20y-m-d') ?>" class="form-control" name="start">
                <br>
                <span class="sub-label">Partenza</span> <br>
                <input type="date" min="<?php echo date('20y-m-d') ?>" class="form-control" name="end">
            </div>
            <div class="form-group">
                <label for="ospiti">N. Persone<span class="req">*</span></label>
                <input type="number" min="1" max="5" class="form-control" name="ospiti">
            </div>
            <div class="form-group">
                <label for="pagamento">Metodo di pagamento<span class="req">*</span></label> <br>
                <select class="form-contol" name="pagamento">
                    <option value="paypal" default="true"> PayPal </option>
                    <option value="bonifico"> Bonifico </option>
                </select>
            </div>
            <input type="submit" name="sub-mit" class="btn btn-success" >
        </form>
    </body>
</html>
