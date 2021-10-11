<?php
    require '../include/connection.php';
    require '../model/Admin.php';

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $fun = new functions();
        $result = $fun->delete($id);
    }

?>
