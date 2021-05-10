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
    <div class="mb-3 mt-3">
        <a href="/bill/index.php" class="btn btn-primary">back</a>
    </div>


    <div class="mt-3 mb-1">
        
        <form method="get" class ="from from-line">
            <label for="">ID :</label>
            <input type="text" name="id">
            <label for=""> วันที่ :</label>
            <input type="text" name="_date">
            <label for=""> เวลา :</label>
            <input type="text" name="_time">

         
            <label for="">จัดเรียงข้อมูล</label>
            <select name="order" id="">
                <option value="idBill">id</option>
                <option value="_date">date</option>
                <option value="_time">time</option>
                <option value="Total">total</option>
            </select>
            <label for=""></label>
            <select name="by" id="">
                <option value="ASC">น้อย->มาก</option>
                <option value="DESC">มาก->น้อย</option>
            </select>

            <input type="submit" name="search" value="ค้นหา" class='btn btn-secondary'>
            <a href="table_bill.php?id=&_date=&_time=&order=idBill&by=ASC" class="btn btn-secondary">reset</a>
        </form>
    </div>
        
    <table class= "table table-hover border text-center">
        <thead>
            <tr>
                <th>#id</th>
                <th>Date</th>
                <th>Time</th>
                <th>total</th>
                <th>จัดการ</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                $itemObj = new Bill;
                $items = $itemObj->getAllBill($_REQUEST);
                    foreach($items as $item){
                        echo "<tr>
                            <th><a href='list_bill.php?id={$item['idBill']}'>{$item['idBill']}</a></th>
                            <th>{$item['_date']}</th>
                            <th>{$item['_time']}</th>
                            <th>{$item['Total']}</th>
                            <th>
                                <a class = 'btn btn-primary' href = 'bill_print.php?action=print&id={$item['idBill']}&from=table'>PRINT</a> 
                                <a class = 'btn btn-warning' href = 'bill_edit.php?action=edit&idBill={$item['idBill']}'>EDIT</a> 
                                <a class = 'btn btn-danger' href = 'save.php?action=delBill&id={$item['idBill']}'>Delete</a>
                            </th>
                        </tr>";
                    }
            ?>
        </tbody>

    
    </table>


    </div>




    <script src="../js/bootstrap.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/slim.js"></script>
</body>
</html>