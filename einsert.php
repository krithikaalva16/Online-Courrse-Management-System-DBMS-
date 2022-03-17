<?php
 
   $NOTIFICATION=false;
   include 'connect.php';
   if(isset($_POST['submit'])){

     
     $NAME=$_POST['NAME'];
     $EMAIL=$_POST['EMAIL'];
     $DESIGNATION=$_POST['DESIGNATION'];
    
    $errors=array();

    $u="SELECT NAME FROM EMPLOYEE WHERE NAME='$NAME'";
    $uu=mysqli_query($con,$u);

    $e="SELECT EMAIL FROM EMPLOYEE WHERE EMAIL='$EMAIL'";
    $ee=mysqli_query($con,$e);



     if(empty($NAME)){
      $errors['u']="Username Required";
    }else if(mysqli_num_rows($uu)>0){
      $errors['u']="Username exist";
    }

    if(empty($EMAIL)){
      $errors['e']="email Required";
    }else if(mysqli_num_rows($ee)>0){
      $errors['e']="email exist";
    }
    if(empty($DESIGNATION)){
      $errors['d']="Username Required";
      
    }
   
  

    if(count($errors)==0){

    

     $sql="INSERT INTO EMPLOYEE (NAME,EMAIL,DESIGNATION)
     values('$NAME','$EMAIL','$DESIGNATION')";
     $result=mysqli_query($con,$sql);
     if($result){
       echo "<script>alert('done')</script>";
     }else
     echo "<script>alert('failed')</script>";
  }
}

?>






<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    

    <title>courier</title>
    <style>
  input[type=submit]:hover {
    background-color: #45a049;
  }

  input[type=text], select, textarea {
    width: 100%; 
    padding: 12px; 
    border: 1px solid #ccc; 
    border-radius: 4px; 
    box-sizing: border-box; 
    margin-top: 6px; 
    margin-bottom: 16px; 
    resize: vertical 
  }

  #grad1 {
    height: 1000px;
  background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);
  font-family: cursive;
}
.btn-info {
    color: #fff;
    background-color: #3c0af1;
    border-color: #070024;
}


.sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }
        
        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }
        
        .sidenav a:hover {
            color: #f1f1f1;
        }
        
        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
        
        #main {
            transition: margin-left .5s;
            padding: 16px;
        }
        
        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }
            .sidenav a {
                font-size: 18px;
            }
        }

</style>
</head>

    <body>
      <div id="grad1">
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="einsert.php">EMPLOYEE</a>
        <a href="binsert.php">BRANCH</a>
        <a href="cinsert.php">CUSTOMER</a>
        <a href="pinsert.php">PARCEL</a>
        <a href="winsert.php">WAREHOUSE</a>
    </div>
    
    <div id="main">
    
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
    </div>
    
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }
    
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>

    
    
  </head>

  <body>
    
    <div class="container my-5">
     <form method="post">
  


  <div class="form-group">
    <label>NAME</label>
    <input type="text" class="form-control" 
   placeholder="enter the name" name="NAME" autocomplete="off">
   <p class="text-danger"><?php if(isset($errors['u'])) echo $errors['u'] ?></p>
</div>

<div class="form-group">
    <label>EMAIL</label>
    <input type="email" class="form-control" 
    placeholder="enter the email" name="EMAIL" autocomplete="off" >
    <p class="text-danger"><?php if(isset($errors['e'])) echo $errors['e']?></p>
</div>


<div class="form-group">
    <label>DESIGNATION</label>
    <input type="text" class="form-control" 
   placeholder="enter the destination" name="DESIGNATION" autocomplete="off">
   <p class="text-danger"><?php if(isset($errors['d'])) echo $errors['d'] ?></p>
</div>



  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  <button class="btn btn-primary my-5"><a href="edisplay.php"class="text-light">display</a>
            </button>
</form>
</body>
</html> 