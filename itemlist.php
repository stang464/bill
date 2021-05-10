<?php
include('Item.php');
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
        <div>
            <a href="index.php">back</a>
        </div>
        <div class="mt-2">
            <a href="addItem.php" class="btn btn-success">Add+</a>
        </div>
        <div class="mt-2 mb-2 row ">
            <form method="get" class="from from-line">
                <label for="">ID :</label>
                <input type="text" name="id">
                <label for=""> Product :</label>
                <input type="text" name="product">
                <label for=""> Price :</label>
                <input type="text" name="price">


                <label for="">จัดเรียงข้อมูล</label>
                <select name="order" id="">
                    <option value="idItem">id</option>
                    <option value="product">product</option>
                    <option value="price">price</option>
                </select>
                
                <select name="by" id="">
                    <option value="ASC">น้อย->มาก</option>
                    <option value="DESC">มาก->น้อย</option>
                </select>
                <input type="submit" name="search" value="ค้นหา" class='btn  btn-secondary'>
                <a href="itemlist.php?id=&product=&price=&order=&by=ASC" class="btn btn-secondary">reset</a>
            </form>
        </div>
        <div class="mt-2 text-center">

            <table class="table table-hover border ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>product</th>
                        <th>price</th>
                        <th>จัดการ</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $itemObj = new Item();
                    $items = $itemObj->getAllItem($_REQUEST);
                    foreach ($items as $item) {
                        echo "<tr>
                        <td>{$item['idItem']}</td>
                        <td>{$item['product']}</td>
                        <td>{$item['price']}</td>
                        <td><a href='editItem.php?edit_id={$item['idItem']}&action=edit' class='btn btn-warning'>edit</a>
                        <a href='saveitem.php?del_id={$item['idItem']}&action=delete' class='btn btn-danger'>delete</a></td>";
                    }
                    ?>
                    </tr>
                </tbody>
            </table>

        </div>


    </div>



    <script src="js/bootstrap.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/slim.js"></script>
</body>

</html>