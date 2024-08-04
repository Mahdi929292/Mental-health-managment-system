<?php
include("include/connection.php");
if(isset($_POST['apply'])){
    $firstname=$_POST['fname'];
    $surname=$_POST['sname'];
    $username=$_POST['uname'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $country=$_POST['country'];
    $password=$_POST['pass'];
    $confirm_password=$_POST['con_pass'];
$error=array();
if(empty($firstname)){
$error['apply']="Enter FirstName!!";
}else if(empty($surname)){
    $error['apply']="Enter LastName!!";
}else if(empty($username)){
    $error['apply']="Enter UserName!!";
}else if(empty($email)){
    $error['apply']="Enter Email!!";
}else if(empty($gender)){
    $error['apply']="Select a Gender!";
}else if(empty($phone)){
    $error['apply']="Enter Phone Number";
}else if(empty($country)){
    $error['apply']="Enter State!";
}else if(empty($password)){
    $error['apply']="Enter Password!";
}else if(empty($confirm_password)){
$error['apply']="Confirm Your Password!";
}else if($password!=$confirm_password){
    $error['apply']="Password doesn't Match!";
}

if(count($error)==0){
 $query="INSERT INTO doctors(firstname,surname,username,email,gender,phone,country,password,salary,data_reg,status,profile) 
 VALUES('$firstname','$surname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pendding','doctor.jpg')";
 $result=mysqli_query($connection,$query);
 if($result){
    echo "<script>alert('You have successfuly applied')</script>";
    header("Location: doctorlogin.php");
 }else{
        echo "<script>alert('Failed')</script>";
 }
}
}
if(isset($error['apply'])){
    $s=$error['apply'];
    $show="<h5 class='text-center alert alert-danger'>$s</h5>";
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
    <title>Apply</title>
</head>
<body>
    <?php
    include("include/header.php");
    ?>
                        <?php
                        echo $show;
                        ?>

    <form method="post">
        <h3>Doctor Apply</h3>

        <label>Firstname</label>
        <input type="text" name="fname" autocomplete="off"
        value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">

        <label>Lastname</label>
        <input type="text" name="sname" autocomplete="off"
        value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>">

        <label>Username</label>
        <input type="text" name="uname" autocomplete="off"
        value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">

        <label>Email</label>
        <input type="email" name="email" autocomplete="off"
        value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">

        <label>Select Gender</label>
        <select name="gender" class="form-control">
        <option value="" style="color:black">Select Gender</option>
        <option value="Male" style="color:black">Male</option>
        <option value="Female" style="color:black">Female</option>
        </select>

        <label>Phone Number</label>
        <input type="number" inputmode="numeric" name="phone" autocomplete="off"
        value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">

        <label>Select State</label>
        <select name="country" class="form-control">
        <option value="" style="color:black">Select State</option>
        <option value="Beirut" style="color:black">Beirut</option>
        <option value="Bekaa" style="color:black">Bekaa</option>
        <option value="Sour" style="color:black">Sour</option>
        <option value="Nabatieh" style="color:black">Nabatieh</option>
        <option value="Mount-Lebanon" style="color:black">Mount-Lebanon</option>
        </select>

        <label>Password</label>
        <input type="password" name="pass" autocomplete="off">

        <label>Confirm Password</label>
        <input type="password" name="con_pass" autocomplete="off">
        <input type="submit" name="apply" value="Apply Now" class="login">
        <div class="social">
            <a href="doctorlogin.php"><div class="go">Already have an account? Login</div></a>
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
    background-image: url("https://apibhs.com/wp-content/uploads/2020/01/mental-health23.jpg");
  background-repeat: no-repeat;
  background-size:cover ;
  background-attachment: fixed;
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
    height: 175vh;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 100%;
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