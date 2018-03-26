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
            include 'NavigateBar.php';
    ?>
    <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        <p>Please, login <a href='login.php'>here</a></p>
    </div>
    <?php
        }else{
            if($_SESSION['admin'] == 1) include 'NavigateBarAdmin.php';
            else include 'NavigateBarCont.php';                                            
    ?>
        <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        </div>    
    <?php
        }
        mysqli_close($conn);
    ?>
</body>

</html>
