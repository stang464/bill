<?php
require_once('Item.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>

<body>

    <div class="container">
        <div class="mt-5"></div>
        <div class="row">
            <div class="col">
                <a href="billing/billing.php">Billing</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="itemlist.php?id=&product=&price=&order=&by=ASC">item list</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="./billing/table_bill.php?id=&_date=&_time=&order">Bill list</a>
            </div>
        </div>

    </div>




    <script src="js/bootstrap.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/slim.js"></script>
</body>

</html>