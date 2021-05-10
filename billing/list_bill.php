<?php
include('func.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
</head>

<body>

    <div class="container">

        <div class='mt-3 mb-3'>
            <a href="table_bill.php?id=&_date=&_time=&order=idBill&by=ASC" class="btn btn-primary">back</a>
        </div>

        <table class="table table-hover border">
            <thead>
                <tr>
                    <th>#idList</th>
                    <th>idBill</th>
                    <th>idItem</th>
                    <th>product</th>
                    <th>Unit</th>
                    <th>price</th>
                    <th>total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $itemObj = new Bill;
                $items = $itemObj->getlistByidBillJoined($_REQUEST['id']);
                foreach ($items as $item) {
                    $total = $item['price'] * $item['unit'];
                    echo "<tr>
                            <th>{$item['idList']}</th>
                            <th>{$item['idBill']}</th>
                            <th>{$item['idItem']}</th>
                            <th>{$item['product']}</th>
                            <th>{$item['unit']}</th>
                            <th>{$item['price']}</th>
                            <th>{$total}</th>
                        </tr>";
                }
                ?>
            </tbody>


        </table>


    </div>
</body>

</html>