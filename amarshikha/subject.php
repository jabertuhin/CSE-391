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
            if(!isset($_GET['cls'])){
                header("location: class.php");
            }else{
                $_SESSION['cls'] = $_GET['cls'];
        ?>
        <h2>Choose Your Subject</h2>
        <form action = 'chapter.php' method="get">
            <?php
                $sql = "select *from subject where class_code = {$_GET['cls']}";
                $result = mysqli_query($conn,$sql);                                
            
                while($arr = mysqli_fetch_array($result,MYSQLI_ASSOC)){                    
                    echo "<input type='radio' name='sub' value=\"{$arr['code']}\">{$arr['subject_name']}";
                    echo "    <a href = \"{$arr['book_link']}\" target=\"_blank\">(PDF)</a><br/>";
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
