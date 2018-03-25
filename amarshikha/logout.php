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
            require 'NavigateBarCont.php';
            echo "Please, login <a href = 'login.php'>here</a>";
        }else{
            if($_SESSION['admin'] == 1) require 'NavigateBarAdmin.php';
            else require 'NavigateBarCont.php';
            session_destroy();
            mysqli_close($conn);
            header("location: index.php");
        }
    ?>
        <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        </div>
</body>

</html>
