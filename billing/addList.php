<?php
include('../Item.php');
session_start();

// $_SESSION['product'];
// $_SESSION['qly'];

if (isset($_REQUEST['submit'])) {

    $_SESSION['product'][] = $_REQUEST['item'];
    $_SESSION['qly'][] = $_REQUEST['qly'];
    // print_r($_SESSION['product']);
    // print_r($_SESSION['qly']);
}

if (isset($_REQUEST['clear'])) {
    $_SESSION['product'] = null;
    $_SESSION['qly'] = null;
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
        <div class="mt-3">
            <a href="/bill/index.php" class="btn btn-primary">back</a>
        </div>
        <div class='mt-5'>

            <form action="" method="POST">

                <label for="">item</label>
                <select name="item" id="">
                    <option value=''>เลือก</option>
                    <?php
                    $itemObj = new Item();
                    $items = $itemObj->getAllItem();

                    foreach ($items as $item) {
                        echo "<option value='{$item['idItem']}'>{$item['product']}</option>";
                    }

                    ?>
                </select>
                <label for="">item</label>
                <input type="number" name="qly">
                <input type="submit" value="submit" name="submit">
            </form>

        </div>

        <form method="POST"><input type="submit" value="clear" name="clear"></form>


        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>สินค้า</th>
                    <th>จำนวน</th>
                    <th>ราคา</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $price = [];
                if (isset($_SESSION['product'])) {
                    $i=0;
                    for ($i = 0; $i < count($_SESSION['product']); $i++) {
                        $itemObj = new Item();
                        $item = $itemObj->getItemById($_SESSION['product'][$i]);
                        
                        $price[$i] = $_SESSION['qly'][$i] * $item['price'] ;
                        echo "<tr>
                                <th>
                                    {$item['product']}
                                </th>
                                <th>
                                    {$_SESSION['qly'][$i]}
                                </th>
                                <th>
                                    $price[$i]
                                </th>
                            </tr>";
                    }
                }
                    $total = 0;

                if(isset($price)){
                    for($i=0; $i<count($price);$i++){
                        $total = $total + $price[$i];

                    }
                }
                ?>
            </tbody>

        </table>
            <div>
                <p>รวม <?php echo $total ?> บาท</p>
            </div>

            <div>
                <a href="save.php?action=addlist&idBill=<?php echo $_REQUEST['idBill'] ?>" class="btn btn-success">เพิ่ม</a>
            </div>
    </div>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/slim.js"></script>
</body>
</html>