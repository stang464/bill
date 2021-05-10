<?php
    include("item.php");

    if($_REQUEST['action'] == 'delete'){
        $itemObj = new Item;
        $itemObj->delItem($_REQUEST['del_id']);

        header("location: itemlist.php");
    }elseif($_REQUEST["action"] == 'update'){

        $itemOB;

    }else{
        $itemObj = new Item;
        $itemObj->insertItem($_REQUEST);
        header("location: itemlist.php");
    }


?>