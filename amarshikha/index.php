<!doctype html>

<html lang="en">
<meta charset="utf-8">
<link href="style1.css" rel="stylesheet">

<head>
    <title>amarshikha</title>
</head>

<body>
    <?php        
        require 'connect.php';
        session_start();
    
        if(!isset($_SESSION['mail']) && !isset($_SESSION['pass'])){
            require 'NavigateBar.php';            
        }else{
            if($_SESSION['admin'] == 1) require 'NavigateBarAdmin.php';
            else require 'NavigateBarCont.php';
        }
    ?>
        <div style="margin-left:25%;padding:1px 16px;height:1000px;">
            <h3 id="home">Home:</h3>
            <p>
                <?php
                $sql = "select description from common_info where code = 'home'";
                $home_det = mysqli_query($conn,$sql);
                //$row=mysqli_fetch_array($home_det,MYSQLI_ASSOC);
                $row = mysqli_fetch_array($home_det,MYSQLI_NUM);
                echo $row[0];
            ?>
            </p>
            <h3 id="event">Event News:</h3>
            <p>
                <?php
                $sql = "select description from common_info where code = 'home'";
                $home_det = mysqli_query($conn,$sql);
                //$row=mysqli_fetch_array($home_det,MYSQLI_ASSOC);
                $row = mysqli_fetch_array($home_det,MYSQLI_NUM);
                echo $row[0];
            ?>
            </p>
            <h3 id="contact">Contact:</h3>
            <p>
                <?php
                $sql = "select description from common_info where code = 'contact'";
                $home_det = mysqli_query($conn,$sql);
                //$row=mysqli_fetch_array($home_det,MYSQLI_ASSOC);
                $row = mysqli_fetch_array($home_det,MYSQLI_NUM);
                echo $row[0];
            ?>
            </p>
            <h3 id="about">About:</h3>
            <p>
                <?php
                $sql = "select description from common_info where code = 'home'";
                $home_det = mysqli_query($conn,$sql);
                //$row=mysqli_fetch_array($home_det,MYSQLI_ASSOC);
                $row = mysqli_fetch_array($home_det,MYSQLI_NUM);
                echo $row[0];
            ?>
            </p>
        </div>
        <?php 
        mysqli_close($conn);
    ?>
</body>

</html>
