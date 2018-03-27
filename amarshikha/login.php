<!doctype html>

<html lang="en">
<meta charset="utf-8">
<link href="style1.css" rel="stylesheet">

<head>
    <title>amarshikha</title>
</head>

<body>
    <?php
        require 'NavigateBar.php';
        require 'connect.php';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $mail = valid($_POST['mail']);
            $pass = sha1(valid($_POST['pass']));
            
            $sql = "select * from account_info where mail_id = '$mail' and password = '$pass' ";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_num_rows($result);
                        
            
            if($row>0){
                session_start();
                $arr = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $_SESSION['mail'] = $mail;
                $_SESSION['pass'] = $pass;
                $_SESSION['admin'] = $arr['admin_check'];
                header("location: profile.php");
            }else{
                require 'NavigateBar.php';
                echo "<div style=\"margin-left:25%;padding:1px 16px;height:1000px;\">";
                echo "<h2>Your password or mail id is wrong.<h2>";
                echo "</div><br/><br/>";
            }                                                                        
        }else{
    ?>  
    
    <div style="margin-left:25%;padding:1px 16px;height:1000px;">        
        <h1>Log In</h1>
        <form action = '' method="post">
            <label for="email">Email</label>
            <input type=email name="mail" placeholder ="Email id"/><br/>
            <label for="pass">Password</label>
            <input type= password name="pass" placeholder ="password"/><br/>
            <input type= submit name="Login" value="Login"/>
            <br/>
            <a href="signup.php">Don't have an account? Sign up!</a>
        </form>        
    </div>
    <?php
        }
        mysqli_close($conn);
    ?>
</body>

</html>
