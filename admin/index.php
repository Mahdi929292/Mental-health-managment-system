<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
       <div class="col-md-2" style="margin-left:-33px"> 
        <?php
        include("sidenav.php");
        ?>
       </div>
       <div class="col-md-10"> 
        <h4 class="my-2">Admin Dashboard</h4>
        <div class="col-md-12 my-1">
        <div class="row">
            <div class="col-md-3 bg-success mx-2" style="height:130px;">
              <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <?php
                        $ad=mysqli_query($connection,"SELECT * FROM admin");
                        $num=mysqli_num_rows($ad);
                        ?>
                        <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $num ?></h5>
                        <h5 class="my-2 text-white">Total</h5>
                        <h5 class="my-2 text-white">Admins</h5>
                    </div>
                    <div class="col-md-4">
                    <a href="admin.php"><i class="fa fa-user-cog fa-3x my-4" style="color:white;"></i></a> 
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 bg-info mx-2" style="height:130px;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                       <?php 
                       $doctor=mysqli_query($connection,"SELECT * FROM doctors WHERE status='Approved'");
                       $num2=mysqli_num_rows($doctor);
                       ?>
                        <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $num2; ?></h5>
                        <h5 class="my-2 text-white">Total</h5>
                        <h5 class="my-2 text-white">Doctors</h5>
                    </div>
                    <div class="col-md-4">
                    
                    <a href="doctor.php"><i class="fa fa-solid fa-stethoscope fa-3x my-4" style="color:white;"></i></a> 
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 bg-warning mx-2" style="height:130px;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <?php 
                        $p=mysqli_query($connection,"SELECT * FROM patient");
                        $pp=mysqli_num_rows($p)
                        ?>
                        <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $pp;?></h5>
                        <h5 class="my-2 text-white">Total</h5>
                        <h5 class="my-2 text-white">Patients</h5>
                    </div>
                    <div class="col-md-4">
                        
                    <a href="patient.php"><i class="fa fa-hospital-user fa-3x my-4" style="color:white;"></i></a> 
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 bg-danger my-2 mx-2" style="height:130px;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                    <?php 
                    $re=mysqli_query($connection,"SELECT * FROM report");
                    $rep=mysqli_num_rows($re);
                      ?>
                        <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $rep ; ?></h5>
                        <h5 class="my-2 text-white">Total</h5>
                        <h5 class="my-2 text-white">Reports</h5>
                    </div>
                    <div class="col-md-4">
                    <a href="report.php"><i class="fa fa-book-medical fa-3x my-4" style="color:white;"></i></a> 
                    </div>
                </div>
              </div>
            </div> 
            <div class="col-md-3 bg-warning my-2 mx-2" style="height:130px;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                    <?php 
                        $job=mysqli_query($connection,"SELECT * FROM doctors WHERE status='Pendding'");
                        $num1=mysqli_num_rows($job);
                        ?>
                        <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $num1; ?></h5>
                        <h5 class="my-2 text-white">Total</h5>
                        <h5 class="my-2 text-white">Job Requests</h5>
                    </div>
                    <div class="col-md-4">
                    <a href="job_request.php"><i class="fa fa-briefcase fa-3x my-4" style="color:white;"></i></a> 
                    </div>
                </div>
              </div>
            </div> 
            <div class="col-md-3 bg-success my-2 mx-2" style="height:130px;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <?php
                        $in=mysqli_query($connection,"SELECT sum(amount_paid) as profit FROM Income");
                        $row=mysqli_fetch_array($in);
                        $inc=$row['profit'];
                        
                        ?>
                        <h5 class="my-2 text-white" style="font-size:30px;"><?php echo "$$inc";?></h5>
                        <h5 class="my-2 text-white">Total</h5>
                        <h5 class="my-2 text-white">Gaining</h5>
                    </div>
                    <div class="col-md-4">
                    <a href="income.php"><i class="fa fa-money-check fa-3x my-4" style="color:white;"></i></a> 
                    </div>
                </div>
              </div>
            </div>  
        </div>
        </div>
       </div>
      </div>
     </div>
    </div>
</body>
</html>