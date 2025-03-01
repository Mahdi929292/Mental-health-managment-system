<?php 
session_start();
include("include/connection.php");

if(isset($_POST['login'])){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if(empty($uname)){
        echo "<script>alert('Enter Username')</script>";
    } else if(empty($pass)){
        echo "<script>alert('Enter Password')</script>";
    } else {
        $query = "SELECT * FROM patient WHERE username = ? AND password = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ss", $uname, $pass);
        $stmt->execute();
        $res = $stmt->get_result();

        if($res->num_rows == 1){
            $_SESSION['patient'] = $uname;
            header("Location:patient/index.php");
        } else {
            echo "<script>alert('Invalid Username or Password')</script>";
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>MIND-MATTERS</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="icon" href="https://static.vecteezy.com/system/resources/previews/007/474/898/original/mental-health-glyph-circle-gradient-background-icon-vector.jpg" type="image/icon type">
</head>
<body>
    <?php 
    include("include/header.php");
    ?>
    
    <form method="post">
        <h3>Patient Login</h3>

        <label for="username">Username</label>
        <input type="text" name="uname">

        <label for="password">Password</label>
        <input type="password" name="pass">

        <input type="submit" name="login" class="login">
        <div class="social">
            <a href="account.php"><div class="go">Register</div></a>
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
