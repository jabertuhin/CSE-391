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
    ?>
        <div style="margin-left:25%;padding:1px 16px;height:1000px;">
            <form>
                <fieldset>
                    <legend>My Profile:</legend>
                    <?php
                        $mail = $_SESSION['mail'];
                        $pass = $_SESSION['pass'];
                        $sql = "select *from account_info where mail_id = '$mail' password = '$pass'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_num_rows($result);
                        echo "<h1>{$row}</h1>";
                        while($arr = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            echo "<label>username : </label> {$arr['username']}<br/>";
                        }                                                
                    ?>
                    <label>username : </label>
                    Name: <input type="text"><br> Email: <input type="text"><br> Date of birth: <input type="text">
                </fieldset>
            </form>
        </div>
        <?php 
        }
        mysqli_close($conn);
    ?>
</body>

</html>
