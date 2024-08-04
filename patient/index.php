<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIND-MATTERS</title>
    <link rel="icon" href="../assets/back.png" type="image/icon type">

</head>
<body>
    <?php 
    include("../include/header.php");
    include("../include/connection.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2"style="margin-left:-33px;">
                <?php 
                include("sidenav.php");
                ?>
                </div>
                <div class="col-md-10">
            <h5 class="my-3">Patient Dashboard</h5>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 bg-primary mx-2" style="height:150px;">
                       <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                            <h5 class="text-white my-4">My Profile</h5>
                            </div>
                            <div class="col-md-4">
                                <a href="profile.php">
                                    <i class="fa fa-user-circle fa-3x my-4" style="color:white"></i>
                                </a>
                            </div>
                        </div>
                       </div>
                    </div>
                    <div class="col-md-3 bg-warning mx-2" style="height:150px;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                            <h5 class="text-white my-4">Book Appointment</h5>
                            </div>
                            <div class="col-md-4">
                                <a href="appointment.php">
                                    <i class="fa fa-calendar fa-3x my-4" style="color:white"></i>
                                </a>
                            </div>
                        </div>
                       </div>
                    </div>
                    <div class="col-md-3 bg-success mx-2" style="height:150px;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                            <h5 class="text-white my-4">My Invoice</h5>
                            </div>
                            <div class="col-md-4">
                                <a href="invoice.php">
                                    <i class="fas fa-file-invoice-dollar fa-3x my-4" style="color:white"></i>
                                </a>
                            </div>
                        </div>
                       </div>
                    </div>

                    

                </div>
            </div>

            <?php 
            if(isset($_POST['send'])){
                $title=$_POST['send'];
                $message=$_POST['message'];
                if(empty($title)){

                }else if(empty($message)){

                }else{
                    $user=$_SESSION['patient'];
                    $query="INSERT INTO report(title,message,username,date_send) VALUES('$title','$message','$user',NOW())";
                    $res=mysqli_query($connection,$query);
                    if($res){
                        echo "<script>alert('Your report has been sent successfully')</script>";
                    }
                }
            }
            ?>
            <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post">
        <h3>Send Report</h3>

        <label>Report Title</label>
        <input type="text" name="title" autocomplete="off">

        <label for="password">Report Content</label>
        <input type="text" name="message" autocomplete="off">

        <input type="submit" name="send" value="Send Report" class="login">
    </form>

        </div>
        </div>
        
    </div>
            </div>
        
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
    background-repeat: no-repeat;
    background-size: cover;
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
    height: 80vh;
    width: 70vh;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 70%;
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
</html>