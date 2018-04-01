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
            //INSERT INTO account_info('username', 'mail_id', 'job', 'institute', 'password',) VALUES ($username,$mail,$job,$job,$pass)
            $username = valid($_POST['username']);
            $mail = valid($_POST['mail']);
            $job = valid($_POST['job']);
            $inst = valid($_POST['institute']);
            $pass = sha1(valid($_POST['pass']));
                
            $sql = "INSERT INTO account_info (username,mail_id,job,institute,password) VALUES ('$username','$mail','$job','$inst','$pass') ";
            echo "<div style=\"margin-left:25%;padding:1px 16px;height:1000px;\">";
            
            $sql_mail_check = "select username from account_info where mail_id = '$mail' ";
            $result = mysqli_query($conn,$sql_mail_check);
            
            if(mysqli_num_rows($result)>0){
                echo "<h3>This mail id is already taken. Use another mail id to sign up</h3><br/>";
                echo "<a href = \"signup.php\">Sign Up</a>";
            }else if(mysqli_query($conn,$sql)){
                //$sql = "INSERT INTO account_info (username,mail_id,job,institute,password) VALUES ('$username','$mail','$job','$inst','$pass') ";
                
                echo "<h3>Your account has been created. Now you can log in.</h3><br/>";
                echo "<a href = \"login.php\">Log In</a>";
            }else{
                echo "Try again later.<br/>";
            } 
            echo "</div>";
        }else{
    ?>  
    
    <div style="margin-left:25%;padding:1px 16px;height:1000px;">        
        <h1>Sign Up</h1>
        <form action ='' method="POST">
            <table>
                <tr>
                    <td><label for="username">Username</label></td>
                    <td><input type=text name="username" placeholder ="Username" maxlength = 50 required/></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type=email name="mail" placeholder ="Email id" required/></td>
                </tr>
                <tr>
                    <td><label for="job">Job</label></td>
                    <td><input type=text name="job" placeholder ="Job" required/></td>
                </tr>
                <tr>
                    <td><label for="institute">Institute</label></td>
                    <td><input type= text name="institute" placeholder ="Institute" required/></td>
                </tr>
                <tr>
                    <td><label for="pass">Password</label></td>
                    <td><input type= password name="pass" placeholder ="password" required/></td>
                </tr>
            </table>
            <input type= submit name="signup" value="Sign Up"/>
            <br/>            
        </form>        
    </div>
    <?php         
        }
        mysqli_close($conn);
    ?>
</body>

</html>
