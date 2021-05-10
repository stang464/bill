<?php
require_once "connect.php";

class Item extends Db{

    public function getAllItem($fillters=[]){
        $where = "";
        $order = "";
        if($fillters['order']){
            $order .= "ORDER BY {$fillters['order']} {$fillters['by']}";
        }
        if($fillters['id']){
            $where .= "AND idItem = :id";
        }
        if($fillters['product']){
            $where .= "AND product = :product";
        }
        if($fillters['price']){
            $where .= "AND price = :price";
        }
        $sql = "SELECT * FROM items 
                WHERE idItem>0
                {$where}
                {$order}
                ";
        $stmt = $this->pdo->prepare($sql);
        
        if($fillters['id']){
            $stmt->bindParam(":id",$fillters['id']);
        }
        if($fillters['product']){
            $stmt->bindParam(":product",$fillters['product']);
        }
        if($fillters['price']){
            $stmt->bindParam(":price",$fillters['price']);
        }
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }


    public function insertItem($item){
        $sql = "INSERT INTO items (product, price)
            VALUES (:product, :price)
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($item);
        return $this->pdo->lastInsertId();
    }

    public function delItem($id){
        $sql = "DELETE FROM items WHERE (iditem = :id) ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function updateItem($item){
        $sql = "UPDATE items SET product=:product, price=:price WHERE idItem = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':product',$item['product']);
        $stmt->bindParam(':price',$item['price']);
        $stmt->bindParam(':id',$item['id']);
        $stmt->execute();
        header("refresh:0.1;itemlist.php?id=&product=&price=&order=&by=ASC");
    }

    public function getItemById($id){
        $sql = "SELECT items.product, items.price FROM  items WHERE idItem = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data[0];
        
    }

}
?>