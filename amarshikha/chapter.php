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
                header("location: subject.php");
            }else{
                $_SESSION['sub'] = $_GET['sub'];
        ?>
        <h2>Choose Your Subject</h2>
        <form action = 'lesson.php' method="get">
            <?php
                $sql = "select *from chapter where class_code = {$_SESSION['cls']} and subject_code= {$_GET['sub']}";
                $result = mysqli_query($conn,$sql);                                            
                while($arr = mysqli_fetch_array($result,MYSQLI_ASSOC)){                    
                    echo "<input type='radio' name='chap' value=\"{$arr['code']}\">{$arr['chapter_name']}<br>";
                    //echo $arr['code']."--".$arr['class_name']."<br/>";
                }                
            ?>
            <input type= submit name="submit"/>
        </form>        
    </div>
    <?php 
        }
        mysqli_close($conn);
    ?>
</body>

</html>
