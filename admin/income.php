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
                    <h5 class="text-center my-2">Total Income</h5>
                    <?php 
                    $query="SELECT * FROM Income";
                    $res=mysqli_query($connection,$query);
                    $output="";
                    $output.="
                    <table class='table table-bordered'>
                    <tr>
                    <td>ID</td>
                    <td>Doctor</td>
                    <td>Patient</td>
                    <td>Discharge Date</td>
                    <td>Amount Paid</td>
                    </tr>
                    ";
                    if(mysqli_num_rows($res)<1){
                        $output.="
                        <tr>
                        <td class='text-center' colspan='4'>No Patient Discharge Yet</td>
                        </tr>
                        ";
                    }
                    while($row=mysqli_fetch_array($res)){
                        $output.="
                        <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['doctor']."</td>
                        <td>".$row['patient']."</td>
                        <td>".$row['date_discharge']."</td>
                        <td>".$row['amount_paid']."</td>
                        ";
                    }
                    $output .="</tr></table>";
                    echo $output;
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>