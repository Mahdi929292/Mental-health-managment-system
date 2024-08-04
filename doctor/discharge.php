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
            <div class="col-md-2" style="margin-left:-33px;">
             <?php 
             include("sidenav.php");
             ?>
            </div>
            <div class="col-md-10">
                <h5 class="text-center my-2">Total Appointments</h5>
                <?php 
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $query="SELECT * FROM appointment WHERE id='$id'";
                    $res=mysqli_query($connection,$query);
                    $row=mysqli_fetch_array($res);
                }
                ?>
                <div class="col-md-12">
                    <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="2" class="text-center">Appointment Details</td>

                            </tr>
                            <tr>
                                <td>Firstname</td>
                                <td><?php echo $row['firstname'];?></td>
                            </tr>
                            <tr>
                                <td>Surname</td>
                                <td><?php echo $row['surname'];?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?php echo $row['gender'];?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><?php echo $row['phone'];?></td>
                            </tr>
                            <tr>
                                <td>Appointment Date</td>
                                <td><?php echo $row['appointment_date'];?></td>
                            </tr>
                            <tr>
                                <td>Symptoms</td>
                                <td><?php echo $row['symptoms'];?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-center my-1">Invoice</h5>
                        <?php 
                        if(isset($_POST['send'])){
                            $fee=$_POST['fee'];
                            $des=$_POST['des'];
                            if(empty($fee)){

                            }else if(empty($des)){

                            }else{
                                $doc=$_SESSION['doctor'];
                                $fname=$row['firstname'];
                                $query="INSERT INTO income(doctor,patient,date_discharge,amount_paid,description) 
                                VALUES('$doc','$fname',NOW(),'$fee','$des')";
                                $res=mysqli_query($connection,$query);
                                if($res){
                                    echo "<script>alert('Invoice sent successfuly')</script>";
                                    mysqli_query($connection,"UPDATE appointment SET status='Discharge' WHERE id='$id'");
                                }
                            }
                        }
                        ?>
                        <form method="post">
                            <label>Fee</label>
                            <input type="number" name="fee" class="form-control" autocomplete="off" placeholder="Enter patient fee">
                            <label>Description</label>
                            <input type="text" name="des" class="form-control" autocomplete="off" placeholder="Enter Description">
                            <input type="submit" name="send" class="btn btn-primary my-2" value="Send">
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
    </div>
</body>
</html>