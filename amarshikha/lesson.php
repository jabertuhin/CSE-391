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
        <?php
            if(!isset($_GET['sub'])){
                header("location: chapter.php");
            }else{
                $_SESSION['chap'] = $_GET['chap'];
        ?>
        <h2>Tutorial</h2>
        
    </div>
    <?php 
        }
        session_destroy();
        mysqli_close($conn);
    ?>
</body>

</html>
