<?php

require 'function.php';
if(isset($_POST["register"])){
    if(registrasi($_POST)>0){
        echo"<script>
        alert('user baru berhasil ditambahkan!');</script>";
    }else{
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Registrasi</title>
    </head>
    <body>
        <h1>Registration</h1>
    <form action ="" method="post" enctype="multipart/form-data">
            <ul>
                <li>
                    <label for="firstname">First Name :</label>
                    <input type="text" name="firstname" id="firstname" required>
                </li>
                <li>
                    <label for="lastname">Last Name :</label>
                    <input type="text" name="lastname" id="lastname" required>
                </li>
                <li>
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" required>
                </li>
                <li>
                    <label for="email">Email :</label>
                    <input type="text" name="email" id="email" required>
                </li>
                <li>
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password"required>
                </li>
                <li>
                    <label for="password2">Password :</label>
                    <input type="password" name="password2" id="password2"required>
                </li>
                <li>
                    <td>Gender :</td>
                    <input type="radio" id="pria" name="gender" value="pria"><label for="pria">Pria</label>
                    <input type="radio" id="wanita" name="gender" value="wanita"><label for="wanita">Wanita</label>
                </li>
                <li>
                    <label for="tanggallahir">Tanggal Lahir :</label>
                    <input type="date" name="tanggallahir" id="tanggallahir"required>
                </li>

                <li>
                    <label for="fotoprofil">Foto Profil :</label>
                    <input type= "file" name="fotoprofil" id="fotoprofil" >
                </li>
                <li>
                    <button type="submit" name="register">Sign Up!<button>
                </li>
            </ul>        
        </form>
    </body>
</html>