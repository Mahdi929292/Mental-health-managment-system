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
                <div class="col-md-2" style="margin-left:-33px">
                    <?php 
                    include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-2">Book Appointment</h5>

                    <?php 
                    $pat=$_SESSION['patient']; 
                    $sel=mysqli_query($connection,"SELECT * FROM patient WHERE username='$pat'");
                    $row=mysqli_fetch_array($sel);
                    $firstname=$row['firstname'];
                    $surname=$row['surname'];
                    $gender=$row['gender'];
                    $phone=$row['phone'];
                    if(isset($_POST['book'])){
                        $date=$_POST['date'];
                        $sym=$_POST['sym'];
                        if(empty($sym)){

                        }else{
                            $query="INSERT INTO appointment(firstname, surname, gender, phone, appointment_date, symptoms, status, date_booked) 
                            VALUES('$firstname','$surname','$gender','$phone','$date','$sym','Pendding',NOW())";
                            $res=mysqli_query($connection,$query);
                            if($res){
                                echo "<script>alert('Your appointment has been booked successfully')</script>";
                            }
                        }
                    }
                    ?>

                    <div class="col-md-12">
                        <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 jumbotron">
                            <form method="post">
                                <label>Appointment Date</label>
                                <input type="date" name="date" class="form-control">

                                <label>Symptoms</label>
                                <input type="text" name="sym" class="form-control" autocomplete="off" placeholder="Enter Symptoms">
                                <input type="submit" name="book" class="btn btn-primary my-2" value="Book Appointment">
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>