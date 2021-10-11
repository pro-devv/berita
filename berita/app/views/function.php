<?php

    $conn = mysqli_connect("localhost","root","","uts");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows=[];
        while($row = mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }

    function registrasi($data){
        global $conn;
        
         $firstname= $data["firstname"];
         $lastname= $data["lastname"]; 
         $email= $data["email"];
         $gender= $data["gender"];
         $tanggallahir= $data["tanggallahir"];
         $fotoprofil=  $data["fotoprofil"];

        $username = strtolower(stripslashes($data["username"]));
      
        $password = mysqli_real_escape_string($conn,$data["password"]);
        $password2 = mysqli_real_escape_string($conn,$data["password2"]);
        
        $result = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'");
        if(mysqli_fetch_assoc($result)){
            echo"<script> 
                alert('username sudah ada');
            </script>";
            return false;
        }

        if($password !== $password2){
            echo"<script>
            alert('konfirmasi password tidak sesuai');
            </script>";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

      

        mysqli_query($conn,"INSERT INTO user VALUES('','$firstname','$lastname','$username','$email',
                                                    '$password','$gender',
                                                    '$tanggallahir','$fotoprofil')");

        return mysqli_affected_rows($conn);
    }
?>
