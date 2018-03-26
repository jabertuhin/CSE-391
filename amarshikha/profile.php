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
            echo "<div style=\"margin-left:25%;padding:1px 16px;height:1000px;\">";
            echo "Please, login <a href = 'login.php'>here</a>";
            //echo "<p>Please, login <a href='login.php'>here</a> as an ADMIN to view this page.</p>";
            echo "</div>";
            echo "Please, login <a href = 'login.php'>here</a>";
        }else{
            if($_SESSION['admin'] == 1) include 'NavigateBarAdmin.php';
            else include 'NavigateBarCont.php';
    ?>
        <div style="margin-left:25%;padding:1px 16px;height:1000px;">
            <form>
                <fieldset>
                    <legend>My Profile:</legend>
                    <?php
                        $mail = $_SESSION['mail'];
                        $pass = $_SESSION['pass'];
                        $sql = "select * from account_info where mail_id = '$mail' and password = '$pass' ";
                        
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_num_rows($result);

                        while($arr = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            echo "<label>username : </label> {$arr['username']}<br/>";
                            echo "<label>E-mail : </label> {$arr['mail_id']}<br/>";
                            echo "<label>Job : </label> {$arr['job']}<br/>";
                            echo "<label>Institute : </label> {$arr['institute']}<br/>";
                            echo "<label>Contribution : </label> {$arr['contribution']}<br/>";
                        }                                                
                    ?>
                </fieldset>
            </form>
        </div>
        <?php 
        }
        mysqli_close($conn);
    ?>
</body>

</html>
