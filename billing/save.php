<?php
    include('func.php');

    if($_REQUEST['action'] == 'save'){
        $obj = new Bill;
        $bill = $obj->billInsert($_REQUEST['total']);
        echo $bill;
    
    
        for($i = 0; $i<count($_SESSION['product']); $i++){
            
            $obj = new Bill;
            $list  =  $obj->listInsert($bill,$_SESSION['product'][$i],$_SESSION['qly'][$i]);
        }
        session_destroy();
        header("location: bill_print.php?action=print&id={$bill}&from=billing");   

    }


    if($_REQUEST['action'] == 'addlist'){
        $obj = new Bill;
        for($i = 0; $i<count($_SESSION['product']); $i++){
        $list = $obj->listInsert($_REQUEST['idBill'],$_SESSION['product'][$i],$_SESSION['qly'][$i]);
        }
        session_destroy();
        header("refresh:0.1;bill_edit.php?action=edit&idBill={$_REQUEST['idBill']}");
    }

    
    if($_REQUEST['action'] == 'delete'){
        $obj = new Bill;
        $e = $obj->delListByIdList($_REQUEST['id']);
        header("refresh:0.1;bill_edit.php?action=edit&idBill={$_REQUEST['idBill']}");
    }

    if($_REQUEST['action'] == 'delBill'){
        $obj = new Bill;
        $e = $obj->delListByIdBill($_REQUEST['id']);
        $j = $obj->delBillByIdBill($_REQUEST['id']);
        header("refresh:0.1;table_bill.php?id=&_date=&_time=&order=idBill&by=ASC");
    }
