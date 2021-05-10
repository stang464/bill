<?php
require_once('func.php');

$obj = new Bill;
$data = $obj->getlistByidBillJoined($_REQUEST['id']);
$total = new Bill;
$total = $total->AllUnitFromlistByIdBill($_REQUEST['id']);
$bill = new Bill;
$bill = $bill->getBillByidBill($_REQUEST['id'])



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <title>Document</title>
</head>

<body>
    <div class="container mt-3 ">
        <div class="card">
            <div class="card-body">
                <div name="id">
                    <p>TAX # <?php echo $_REQUEST['id'] ?> </p>
                </div>

                <div>
                    <p>ใบเสร็จรับเงิน / ใบกำกับภาษีแบบย่อ</p>
                </div>

                <table class="table text-center">
                    <?php
                    foreach ($data as $item) {
                        $t = $item['price'] * $item['unit'];

                        echo "  <tr>
                                <th><p>{$item['unit']}</p></th>
                                <th><p>{$item['product']}</p></th>
                                <th><p>{$t} ฿</p></th>
                            </tr>";
                    }
                    ?>
                </table>
                <div class="row text-center">
                    <div class='col-6'>
                        <p>Total (<?php echo $total ?>)</p>
                    </div>
                    <div class='col-6'>
                        <p><?php echo $bill['Total'] ?> ฿</p>
                    </div>
                </div>
                <div>
                    <p><?php echo $bill['_date'] . " " . $bill['_time'] ?></p>

                </div>
            </div>
        </div>

        <div class="mt-1">
            <?php
            if ($_REQUEST['from'] == 'billing') {
                echo "<a href='billing.php' class='btn btn-primary'>back</a>";
            } else {
                echo '<a href="table_bill.php?id=&_date=&_time=&order=idBill&by=ASC" class="btn btn-primary">back</a>';
            }
            ?>

        </div>


    </div>







    <script src="../js/bootstrap.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/slim.js"></script>
</body>

</html>