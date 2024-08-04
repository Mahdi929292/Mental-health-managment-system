<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile Page</title>
    <link rel="icon" href="../assets/back.png" type="image/icon type">

</head>
<body>
    <?php
    include("../include/header.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-33px">
                    <?php 
                    include("sidenav.php");
                    include("../include/connection.php");
                    ?>
                </div>
                <div class="col-md-10">
                  <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                             <?php 
                             $doc=$_SESSION['doctor'];
                             $query="SELECT * FROM doctors WHERE username='$doc'";
                             $res=mysqli_query($connection,$query);
                             $row=mysqli_fetch_array($res);
                             if(isset($_POST['upload'])){
                                $img=$_FILES['img']['name'];
                                if(empty($img)){

                                }else{
                                    $query="UPDATE doctors SET profile='$img' WHERE username='$doc'";
                                    $res=mysqli_query($connection,$query);
                                    if($res){
                                        move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
                                        header("Location:profile.php");
                                    }
                                }
                             }
                             ?>
                                <form method="post" enctype="multipart/form-data">
                                    <?php 
                                    echo "<img src='img/".$row['profile']."' style='height:250px' class='col-md-12 my-3'>";
                                    ?>
                                    <input type="file" name="img" class="form-control my-1">
                                    <input type="submit" name="upload" class="btn btn-primary" value="Update Profile">
                                </form>

                                <div class="my-3">
                                    <table class="table table-bordered">
                                    <tr>
                                        <th class="text-center">Details</th>
                                     </tr>
                                     <tr>
                                        <td>First Name</td>
                                        <td><?php echo $row['firstname']; ?></td>
                                     </tr>
                                     <tr>
                                        <td>SurName</td>
                                        <td><?php echo $row['surname']; ?></td>
                                     </tr>
                                     <tr>
                                        <td>User Name</td>
                                        <td><?php echo $row['username']; ?></td>
                                     </tr>
                                     <tr>
                                        <td>Email</td>
                                        <td><?php echo $row['email']; ?></td>
                                     </tr>
                                     <tr>
                                        <td>Phone Number</td>
                                        <td><?php echo $row['phone']; ?></td>
                                     </tr>
                                     <tr>
                                        <td>Gender</td>
                                        <td><?php echo $row['gender']; ?></td>
                                     </tr>
                                     <tr>
                                        <td>State</td>
                                        <td><?php echo $row['country']; ?></td>
                                     </tr>
                                     <tr>
                                        <td>Salary</td>
                                        <td><?php echo "$". $row['salary']; ?></td>
                                     </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center">Change Username</h5>
                                <?php 
                                if(isset($_POST['change_uname'])){
                                    $uname=$_POST['uname'];
                                    if(empty($uname)){

                                    }else{
                                        $query="UPDATE doctors SET username='$uname' WHERE username='$doc'";
                                        $res=mysqli_query($connection,$query);
                                        if($res){
                                            $_SESSION['doctor']=$uname;
                                        }
                                    }
                                }
                                ?>
                                <form method="post">
                                    <label>Change Username</label>
                                    <input type="text" name="uname" class="form-control" autocapitalize="off" placeholder="Enter Username"><br>
                                    <input type="submit" name="change_uname" class="btn btn-primary" value="Change Username">
                                </form>
                                <br><br>
                                <h5 class="text-center">Change Password</h5>
                                <?php 
                                if(isset($_POST['change_pass'])){
                                    $old=$_POST['old_pass'];
                                    $new=$_POST['new_pass'];
                                    $con=$_POST['con_pass'];
                                    $ol="SELECT * FROM doctors WHERE username='$doc'";
                                    $ols=mysqli_query($connection,$ol);
                                    $row=mysqli_fetch_array($ols);
                                    if($old!=$row['password']){
                                        
                                    }else if(empty($new)){

                                    }else if($con!=$new){

                                    }else{
                                        $query="UPDATE doctors SET password='$new' WHERE username='$doc'";
                                        mysqli_query($connection,$query);
                                    }
                                }
                                ?>
                                <form method="post">
                                    <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="password" name="old_pass" class="form-control" autocapitalize="off" placeholder="Enter Old Password">
                                    <label>New Password</label>
                                    <input type="password" name="new_pass" class="form-control" autocapitalize="off" placeholder="Enter New Password">
                                    <label>Confirm Password</label>
                                    <input type="password" name="con_pass" class="form-control" autocapitalize="off" placeholder="Enter New Password Again">
                                    </div>
                                    <input type="submit" name="change_pass" class="btn btn-danger" value="Change Password">
                                </form>
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