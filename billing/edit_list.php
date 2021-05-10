<?php
include('func.php');

if ($_REQUEST['action'] = 'edit') {
    $obj = new Bill;
    $item = $obj->getlistByidListJoined($_REQUEST['id']);
}

if(isset($_REQUEST['submit'])){
    $idList = $_REQUEST['idList'];
    $idItem = $_REQUEST['idItem'];
    $unit = $_REQUEST['unit'];
    $bill = $_REQUEST['idBill'];
    $obj = new Bill;
    $list = $obj->updateListByidList($idList,$idItem,$unit,);
    header("refresh:0.1;bill_edit.php?action=edit&idBill={$bill}");
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
        <div class="mt-5"></div>
        <form action="" method="POST">

            <label for="">List ID : </label>
            <input name = 'idList'  value="<?php echo $item['idList'] ?>" readonly >

            <label for="">Bill ID : </label>
            <input name = 'idBill' value="<?php echo $item['idBill'] ?>" readonly >

            <br>
            <label >product : </label>


            <select name="idItem"">
                <option value="<?php $item['idItem'] ?>"><?php echo $item['product'] ?></option>

                <?php
                    $itemObj = new Item();
                    $itemlist = $itemObj->getAllItem();
                    foreach ($itemlist as $i) {
                        echo "<option   value='{$i['idItem']}'>{$i['product']}</option>";
                    }
                ?>
                <input type="number" name="unit" value="<?php echo $item['unit'] ?>">
            </select>

            <input type="submit" name="submit" class = "btn btn-success">
            <a href="bill_edit.php?action=edit&idBill=<?php echo $item['idBill'] ?>" class = "btn btn-danger">cancel</a>

        </form>





    </div>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/slim.js"></script>
</body>

</html>