<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>  
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">  
<link rel="icon" href="assets/back.png" type="image/icon type">

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-info bg-primary">
        <h5 class="text-white">MIND_MATTERS</h5>
        <div class="mr-auto"></div>
        <ul class="navbar-nav">
        <?php
         if(isset($_SESSION['admin'])){
            $user=$_SESSION['admin'];
            echo'<li class="nav-item"><a href="" class="nav-link text-white">'.$user.'</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
         }else if(isset($_SESSION['doctor'])){
            $user=$_SESSION['doctor'];
            echo'<li class="nav-item"><a href="" class="nav-link text-white">'.$user.'</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
         }else if(isset($_SESSION['patient'])){
            $user=$_SESSION['patient'];
            echo'<li class="nav-item"><a href="" class="nav-link text-white">'.$user.'</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
         
         }else{echo
        '<li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
        <li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
        <li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>
        <li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">Patient</a></li>';
         }
        ?>
        </ul>
    </nav>
</body>
</html>