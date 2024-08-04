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
                    <h5 class="text-center my-2">My Invoice</h5>
                    <?php 
                    $pat=$_SESSION['patient'];
                    $query="SELECT * FROM patient WHERE username='$pat'";
                    $res=mysqli_query($connection,$query);
                    $row=mysqli_fetch_array($res);
                    $fname=$row['firstname'];
                    $querys=mysqli_query($connection,"SELECT * FROM income WHERE patient='$fname'");
                    $output="";
                    $output.="
                    <table class='table table-bordered'>
                    <tr>
                    <td>ID</td>
                    <td>Doctor</td>
                    <td>Patient</td>
                    <td>Discharge Date</td>
                    <td>Ammount Paid</td>
                    <td>Description</td>
                    <td>Action</td>
                    </tr>
                    
                    ";
                    if(mysqli_num_rows($querys)<1){
                        $output.="
                        <tr>
                        <td colspan='7'>No Invoice Yet</td>
                        </tr>
                        ";

                    }
                    while($row=mysqli_fetch_array($querys)){
                        $output.="
                        <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['doctor']."</td>
                        <td>".$row['patient']."</td>
                        <td>".$row['date_discharge']."</td>
                        <td>".$row['amount_paid']."</td>
                        <td>".$row['description']."</td>
                        <td>
                        <a href='view.php?id=".$row['id']."'>
                        <button class='btn btn-primary'>View</button>
                        </a>
                        </td>
                        ";
                    }
                    $output.="
                    </tr></table>
                    ";
                    echo $output;
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>