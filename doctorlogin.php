
<?php
session_start();
include("include/connection.php");
if(isset($_POST['login'])){
    $uname=$_POST['uname'];
    $password=$_POST['pass'];
    $error=array();

    $q="SELECT * FROM doctors WHERE username='$uname'AND password='$password'";
    $qq=mysqli_query($connection,$q);
    $row=mysqli_fetch_array($qq);


    if(empty($uname)){
        $error['login']="Enter Username";
    }else if(empty($password)){
        $error['login']="Enter password";
    }else if($row['status']=="Pending"){
        $error['login']="Please wait until the adminstration accepts your applied job!";
    }else if($row['status']=="Rejected"){
        $error['login']="Try again later!";
}
if(count($error)==0){
    $query="SELECT * FROM doctors WHERE username='$uname'AND password='$password'";
    $res=mysqli_query($connection,$query);
    if(mysqli_num_rows($res)){
        echo "<script> alert('done')</script>";
        $_SESSION['doctor']=$uname;
        header("Location:doctor/index.php");
    }else{
        echo "<script> alert('Invalid Account')</script>";
    }
}
}


if(isset($error['login'])){
    $l=$error['login'];
    $show="<h5 class='text-center alert alert-danger'>$l</h5>";
}else{
    $show="";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/back.png" type="image/icon type">
    <title>Doctor Login</title>
</head>
<body style="background-image: url(https://wallpapers.com/images/hd/healthcare-background-8u6l9oyzn67dtdas.jpg);background-size:cover;background-repeat:no-repeat;">
    <?php
    include("include/header.php");
    ?>
                    <?php echo $show; ?>

    <form method="post">
        <h3>Doctor Login</h3>

        <label>Username</label>
        <input type="text" name="uname" autocomplete="off">

        <label>Password</label>
        <input type="password" name="pass" autocomplete="off">

        <input type="submit" name="login" class="login" value="Login">
        <div class="social">
            <a href="apply.php"><div class="go">Apply for a Job</div></a>
        </div>
    </form>
</body>
<style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-image: url(https://sahyadrihospital.com/wp-content/uploads/2021/04/psychiatry.jpg.webp);
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
   
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
.login{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
  cursor: pointer;
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

    </style>
    
</html>