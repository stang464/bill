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



    <div class="container  mt-5">

        <div class="mt-3">
            <a href="index.php" class="btn btn-primary">back</a>
        </div>
        <b>Add Item</b>
        <form action="saveitem.php" method="get" class="form-horozontal">

            <label for="Product">product :</label>
            <input type="text" name="product">
            <label for="Price">price</label>
            <input type="text" name="price">
            <input type="submit" class="btn-bg-success">
        </form>


    </div>



    <script src="js/bootstrap.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/slim.js"></script>
</body>

</html>