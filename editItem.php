<?php
include('Item.php');


if (isset($_REQUEST['btn_insert'])) {
    $itemObj = new Item;
    $itemObj->updateItem($_REQUEST);
}

if ($_REQUEST['action'] == 'edit') {
    $itemObj = new Item;
    $item = $itemObj->getItemById($_REQUEST['edit_id']);
}



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

    <div class="container mt-5">
        <div class="mt-3">
            <a href="itemlist.php"> back</a>
        </div>
        <b>Edit Item</b>
        <form action="" method="get" class="form-horozontal">
            <label for="Product">id :</label>
            <input type="text" name="id" value=" <?php echo $_REQUEST['edit_id'] ?>">
            <label for="Product">product :</label>
            <input type="text" name="product" value=" <?php echo $item['product'] ?>">
            <label for="Price">price</label>
            <input type="text" name="price" value=" <?php echo $item['price'] ?> ">
            <input type="submit" name='btn_insert' class="btn btn-success">
            <a href="itemlist.php?id=&product=&price=&order=&by=ASC" class="btn btn-danger ">cancal</a>
        </form>


    </div>



    <script src="js/bootstrap.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/slim.js"></script>
</body>

</html>