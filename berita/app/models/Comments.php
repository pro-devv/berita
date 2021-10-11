<?php

class comments extends Database{

    public function selectComments(){
        $sql    = "SELECT * FROM comments";
        $result = $this->getDb()->query($sql);
        
        if($result->rowCount() > 0){
            while($row = $result->fetch()){
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectUser($id){
        $sql    = "SELECT * FROM users where id =".$id;
        $result = $this->getDb()->query($sql);
        
        if($result->rowCount() > 0){
            while($row = $result->fetch()){
                $data[] = $row;
            }
            return $data;
        }
    }

    public function addComment(){
        $impClm = implode(", ", array_keys($fields));
        $impHolder = implode(", :", array_keys($fields));

        $sql = "INSERT INTO comments (".$impClm.") VALUES (:".$impHolder.")";
        $state = $this->getDb()->prepare($sql);

        foreach($fields as $key => $value){
            $state->bindValue(":".$key, $value);
        }

        $stateExec = $state->execute();

        if($stateExec){
            header('location: ../views/home_admin.php');
        }
    }

    // public function selectLike($userid){
    //     $sql = "SELECT * FROM likes WHERE user_id =".$userid;
    //     $result = $this->getDb()->query($sql);
        
    //     if($result->rowCount() == 1){
    //         while($rows = $result->fetch()){
    //             $data[] = $rows;
    //             foreach($rows as $row){
    //                 echo '<span class="unlike fa fa-thumbs-up" data-id="'.$row['id'].'"></span>';
    //                 echo '<span class="like hide fa fa-thumbs-o-up" data-id="'.$row['id'].'"></span>';
    //             }
    //         }
    //     } else{
    //         while($rows = $result->fetch()){
    //             $data[] = $rows;
    //             foreach($rows as $row){
    //                 echo '<span class="like fa fa-thumbs-o-up" data-id="'.$row['id'].'"></span>';
    //                 echo '<span class="unlike hide fa fa-thumbs-up" data-id="'.$row['id'].'"></span>';
    //             }
    //         }
    //     }
    // }
}