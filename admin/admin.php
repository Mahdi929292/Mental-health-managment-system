<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" href="../assets/back.png" type="image/icon type">

</head>
<body>
    <?php
    include("../include/header.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-33px;">
                  <?php
                  include("sidenav.php");
                  include("../include/connection.php");
                  ?>
                </div>
                <div class="col-md-10">
                  <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                         <h5 class="text-center">All Admins</h5>
                         <?php
                         $ad=$_SESSION['admin'];
                         $query="SELECT * FROM admin WHERE username !='$ad'";
                         $res=mysqli_query($connection,$query);
                         $output="
                          <table class='table table-bordered'>
                          <tr>
                           <th>ID</th>
                           <th>Username</th>
                           <th style='width:10%;'>Action</th>
                           <tr>
                         ";
                         if(mysqli_num_rows($res)<1){
                          $output .="<tr><td colspan='3' class='text-center'>no New Admin</td></tr>";
                         }
                          while($row=mysqli_fetch_array($res)){
                            $id=$row['id'];
                            $username=$row['username'];
                            $output .="
                            <tr>
                            <td>$id</td>
                            <td>$username</td>
                            <td>
                                <a href='admin.php?id=$id'><button id='$id' class='btn btn-danger'>Remove</button></a>
                            </td>
                            ";
                          }
                          $output .="
                           </tr>
                         </table>
                          ";
                          echo $output;

                          if(isset($_GET['id'])){
                            $id=$_GET['id'];
                            $query="DELETE FROM admin WHERE id='$id'";
                            mysqli_query($connection,$query);
                            header("Location: admin.php");
                          }
                          
                         ?>
                        
                           
                          
                        </div>
                        <div class="col-md-6">
                            <?php
                            if(isset($_POST['add'])){
                                $uname=$_POST['uname'];
                                $pass=$_POST['pass'];
                                $image = $_FILES['img']['name'];
                                $error=array();
                                if(empty($uname)){
                                    $error['u']="Enter Admin Username";
                                }else if(empty($pass)){
                                    $error['u']="Enter Admin Password";
                                }else if(empty($image)){
                                    $error['u']="Enter Admin Image";
                                }
                            
                                if(count($error)==0){
                                    $q="INSERT INTO admin(username,password,profile)
                                    VALUES('$uname','$pass','$image')";
                                    $result=mysqli_query($connection,$q);
                                    if($result){
                                        move_uploaded_file($_FILES['img']['tmp_name'],"img/$image");
                                        header("Location: admin.php");
                                    }else{
                                        
                                    }
                                }
                            
                                
                            }
                            if(isset($error['u'])){
                                $er=$error['u'];
                                $show="<h5 class='text-center alert alert-danger'>$er</h5>";
                             }else{
                                $show="";
                             }
                             
                            ?>
                         <h5 class="text-center">Add Admin</h5>
                         <form method="POST" enctype="multipart/form-data">
                            <?php echo $show; ?>

                            <div class="from-group">
                                <label>Username</label>
                                <input type="text" name="uname" class="form-control" autocomplete="off">
                            </div>
                            <div class="from-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control">
                            </div>
                            <div class="from-group">
                                <label>Add Admin Image</label>
                                <input type="file" name="img" class="from-control">
                            </div><br>
                            <input type="submit" name="add" value="Add New Admin" class="btn btn-primary">
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