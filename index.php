<?php
session_start();
include "koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
                <h2> LOGIN BAVANA</h2>
                <form name="form-login" method="post">
                    <div class="mb-3 mt-3">
                      <label>User Name :</label>
                      <input type="text" name="fuser" class="form-control">
                    </div>
                    <div class="mb-3">
                      <label for="password">Password :</label>
                      <input type="password" name="fpassword" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary" name="fmasuk">Submit</button>
                  </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <?php

      if(isset($_POST['fmasuk'])){

        $user = $_POST['fuser'];
        $password = $_POST['fpassword'];
        $qry = mysqli_query($koneksi,"SELECT * FROM admin WHERE user = '$user' AND password = md5('$password')");

        $cek = mysqli_num_rows($qry);
        if($cek==1){
          $_SESSION['userweb']=$user;
          header("location:admin.php");
          exit;
        
        }else{
          echo"maaf nama atau password yang anda masukan salah";
        }
      }
    ?>


</body>
</html>