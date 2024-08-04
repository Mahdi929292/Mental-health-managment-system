<?php 
include("include/connection.php");
if(isset($_POST['create'])){
    $fname=$_POST['fname'];
    $sname=$_POST['sname'];
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $country=$_POST['country'];
    $password=$_POST['pass'];
    $con_pass=$_POST['con_pass'];
    $error= array();
    if(empty($fname)){
        $error['ac']="Enter Firstname";
    }else if(empty($sname)){
        $error['ac']="Enter Surname";
    }else if(empty($uname)){
        $error['ac']="Enter Username";
    }else if(empty($email)){
        $error['ac']="Enter Email";
    }else if(empty($phone)){
        $error['ac']="Enter Phone Number";
    }else if($gender==""){
        $error['ac']="Select Your Gender";
    }else if($country==""){
        $error['ac']="Select Your State";
    }else if(empty($password)){
        $error['ac']="Enter Password";
    }else if($con_pass!=$password){
        $error['ac']="Passwords doesn't match!";
    }

    if(count($error)==0){
        $query = "INSERT INTO patient(firstname, surname, username, email, phone, gender, country, password, date_reg, profile) 
        VALUES('$fname', '$sname', '$uname', '$email', '$phone', '$gender', '$country', '$password', NOW(), 'patient.jpg')";
        $res = mysqli_query($connection, $query);
        if($res){
            header("Location:patientlogin.php");
        }else{
            echo "<script>alert('failed')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIND-MATTERS</title>
    <link rel="icon" href="assets/back.png" type="image/icon type">

</head>
<body>
    <?php 
    include("include/header.php");
    ?>


    <form method="post">
        <h3>Patient Create Account</h3>

        <label>Firstname</label>
        <input type="text" name="fname" autocomplete="off">

        <label>Surname</label>
        <input type="text" name="sname" autocomplete="off" >

        <label>Username</label>
        <input type="text" name="uname" autocomplete="off">

        <label>Email</label>
        <input type="text" name="email"autocomplete="off">

        <label>Phone No</label>
        <input type="number" name="phone" autocomplete="off">

        <label>Gender</label>
        <select name="gender" class="form-control">
          <option value="" style="color:black">Select Your Gender</option>
          <option value="Male" style="color:black">Male</option>
          <option value="Female" style="color:black">Female</option>
        </select>

        <label>State</label>
        <select name="country" class="form-control">
          <option value="" style="color:black">Select State</option>
          <option value="Beirut" style="color:black">Beirut</option>
          <option value="Bekaa" style="color:black">Bekaa</option>
        </select>

        <label>Password</label>
        <input type="password" name="pass" autocomplete="off">

        <label>Confrim Password</label>
        <input type="password" name="con_pass" autocomplete="off">

        <input type="submit" name="create" value="Create Account" class="login">
        <div class="social">
            <a href="patientlogin.php"><div class="go">Have an account?</div></a>
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
    height: 185vh;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 110%;
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