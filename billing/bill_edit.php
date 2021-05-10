<?php
include('func.php');

if ($_REQUEST['action'] == 'edit') {
    $obj = new Bill;
    $bill = $obj->getBillByidBill($_REQUEST['idBill']);
}

if(isset($_REQUEST['submit'])){

    $obj = new Bill;
    $obj->updateBillByIdBill($_REQUEST['idBill'],$_REQUEST['date'],$_REQUEST['time'],$_REQUEST['total']);
    header("refresh:0.1;table_bill.php?id=&_date=&_time=&order=idBill&by=ASC");
}

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
    <div class="container">
        <div class="row mt-5 text-center">
            <b>Bill Edit</b>
            
        </div>




        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#idList</th>
                    <th>idBill</th>
                    <th>idItem</th>
                    <th>product</th>
                    <th>Unit</th>
                    <th>price</th>
                    <th>total</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $itemObj = new Bill;
                $total = 0;
                $items = $itemObj->getlistByidBillJoined($_REQUEST['idBill']);
                foreach ($items as $item) {
                    $price = $item['price'] * $item['unit'];
                    $total = $total + $item['price'] * $item['unit'];
                    echo "<tr>
                            <th>{$item['idList']}</th>
                            <th>{$item['idBill']}</th>
                            <th>{$item['idItem']}</th>
                            <th>{$item['product']}</th>
                            <th>{$item['unit']}</th>
                            <th>{$item['price']}</th>
                            <th>{$price}</th>
                            <th>
                            <a class = 'btn btn-warning' href = 'edit_list.php?action=edit&id={$item['idList']}'>EDIT</a> 
                            <a class = 'btn btn-danger' href = 'save.php?action=delete&id={$item['idList']}&idBill={$item['idBill']}'>Delete</a>
                            </th>
                        </tr>";
                }
                ?>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th><?php
                    echo $total;
                    ?></th>
        
            </tbody>
            <tr><a href="addList.php?idBill=<?php echo $item['idBill']?>" class = "btn btn-primary">add list</a></tr>
        </table>
        


        <form action="" method="POST">

            <div class="form-group">
                <div class="row">
                    <label for="id">Bill id : <?php echo $_REQUEST['idBill'] ?></label>
                </div>
                <label for="">date</label><br>
                <input type="datetime" name="date" value="<?php echo $bill['_date'] ?>">
                <br>
                <label for="">time</label><br>
                <input type="datetime" name="time" value="<?php echo $bill['_time'] ?>">
                <br>
                <label for="">total</label><br>
                <input type="text" name="total" value="<?php echo $total ?>">
                <br>

                <input type="submit" name="submit" value="save" class="btn btn-success mt-2">
                <a href="table_bill.php?id=&_date=&_time=&order=idBill&by=ASC" class="btn btn-danger mt-2">cancal</a>

            </div>

        </form>

    </div>



    <script src="../js/bootstrap.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/slim.js"></script>
</body>

</html>