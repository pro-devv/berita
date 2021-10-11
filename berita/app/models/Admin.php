<?php

require "../core/Database.php";

class functions extends Database{

    public function select(){
        $sql    = "SELECT * FROM dataBerita";
        $result = $this->getDb()->query($sql);
        
        if($result->rowCount() > 0){
            while($row = $result->fetch()){
                $data[] = $row;
            }
            return $data;
        }
    }

    public function insert($fields){
        $impClm = implode(", ", array_keys($fields));
        $impHolder = implode(", :", array_keys($fields));

        $sql = "INSERT INTO dataBerita (".$impClm.") VALUES (:".$impHolder.")";
        $state = $this->getDb()->prepare($sql);

        foreach($fields as $key => $value){
            $state->bindValue(":".$key, $value);
        }

        $stateExec = $state->execute();

        if($stateExec){
            header('location: ../views/home_admin.php');
        }
    }

    public function selectOne($id){
        $sql = "SELECT * FROM dataBerita WHERE id = :id";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($fields, $id){
        $st = "";
        $counter = 1;
        $total_fields = count($fields);

        foreach($fields as $key => $value){
            if($counter === $total_fields){
                $set = "$key = :".$key;
                $st = $st.$set;
            } else{
                $set = "$key = :".$key.", ";
                $st = $st.$set; 
                $counter++;
            }
        }

        $sql = "UPDATE dataBerita SET ".$st." WHERE id = ".$id;
        $stmt = $this->getDb()->prepare($sql);

        foreach($fields as $key => $value){
            $stmt->bindValue(':'.$key, $value);
        }

        $stmtExec = $stmt->execute();

        if($stmtExec){
            header('location: ../views/home_admin.php');
        }
    }

    public function delete($id){
        $sql = "DELETE FROM dataBerita WHERE id = :id";

        $stmt = $this->getDb()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmtExec = $stmt-> execute();

        if($stmtExec){
            header('location: ../views/home_admin.php');
        }
    }
}
