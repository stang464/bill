<?php
include("../Item.php");
require_once("../connect.php");
session_start();

class Bill extends Db
{

    public function billInsert($total)
    {

        $date = date('Y-m-d');
        $time = date("h:i:s");
        $sql = "INSERT INTO bills (_date,_time,total) VALUES (:_date, :_time ,:total) ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('_date', $date);
        $stmt->bindParam('_time', $time);
        $stmt->bindParam(':total', $total);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }


    public function listInsert($idbill, $idItem, $unit)
    {
        $sql = "INSERT INTO list (idBill,idItem,unit) VALUES (:idbill, :idItem, :unit)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":idbill", $idbill);
        $stmt->bindParam(":idItem", $idItem);
        $stmt->bindParam(":unit", $unit);
        $stmt->execute();
    }

    public function getAllBill($fillters = [])
    {
        $where = "";
        $order = "";
        if ($fillters['id']) {
            $where .= " AND idBill = :id ";
        }
        if ($fillters['_date']) {
            $where .= " AND _date = (:_date)";
        }
        if ($fillters['_time']) {
            $where .= " AND _time = (:_time) ";
        }
        if ($fillters['order']) {
            $order .= " ORDER BY {$fillters['order']} {$fillters['by']} ";
        }

        $sql = "SELECT * FROM bills 
                WHERE 
                    idBill>0 
                    {$where}
                    {$order}
                ";

        $stmt = $this->pdo->prepare($sql);
        if ($fillters['id']) {
            $stmt->bindParam(":id", $fillters['id']);
        }
        if ($fillters['_date']) {
            $stmt->bindParam(":_date", $fillters['_date']);
        }
        if ($fillters['_time']) {
            $stmt->bindParam(":_time", $fillters['_time']);
        }

        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function getlistByidBill($id)
    {
        $sql = "SELECT * FROM list WHERE idBill = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function getBillByidBill($id)
    {
        $sql = "SELECT * FROM bills WHERE idBill = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data[0];
    }

    public function getlistByidBillJoined($id)
    {
        $sql = "SELECT list.idList, list.idItem, list.idBill, list.idItem , items.product , list.unit , items.price 
                FROM list
                INNER JOIN items ON list.idItem = items.idItem
                WHERE list.idBill = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }


    public function getlistByidListJoined($id)
    {
        $sql = "SELECT list.idList, list.idItem, list.idBill, list.idItem , items.product , list.unit , items.price 
                FROM list
                INNER JOIN items ON list.idItem = items.idItem
                WHERE list.idList = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data[0];
    }

    public function updateListByidList($idList, $iditem, $unit)
    {
        $sql = "UPDATE list SET idItem = :id , unit = :unit WHERE idList = :idList ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $iditem);
        $stmt->bindParam(":unit", $unit);
        $stmt->bindParam(":idList", $idList);
        $stmt->execute();
    }

    public function updateBillByIdBill($id, $_date, $_time, $total)
    {

        $sql = "UPDATE bills set _date = :_date, _time= :_time ,Total = :total WHERE idBill = :id ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":_date", $_date);
        $stmt->bindParam(":_time", $_time);
        $stmt->bindParam(":total", $total);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function delListByIdList($id)
    {
        $sql = "DELETE FROM list WHERE idList = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function delListByIdBill($id)
    {
        $sql = "DELETE FROM list WHERE idBill = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function delBillByIdBill($id)
    {
        $sql = "DELETE FROM bills WHERE idBill = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function countFromlistByIdBill($id)
    {
        $sql = "SELECT COUNT(*) FROM list WHERE idBill = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $num_row = $stmt->fetchColumn();
        return $num_row;
    }

    public function getTotalFromBillByIdBill($id)
    {
        $sql = "SELECT total FROM bills WHERE idBill = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $total = $stmt->fetchColumn();
        return $total;
    }

    public function getUnitFromListByIdBill($id)
    {
        $sql = "SELECT unit FROM list WHERE idBill = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function AllUnitFromlistByIdBill($id)
    {
        $obj = new Bill;
        $data = $obj->getUnitFromListByIdBill($id);
        $total = 0;
        foreach ($data as $item) {
            $total = $item['unit'] + $total;
        }
        return $total;
    }
}
