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
        <h2>Tutorials for:</h2>
        <form action = 'subject.php' method="get">
            <?php
                $sql = "select *from class";
                $result = mysqli_query($conn,$sql);                                
            
                while($arr = mysqli_fetch_array($result,MYSQLI_NUM)){                    
                    echo "<input type='radio' name='cls' value=\"{$arr[0]}\">{$arr[1]}<br>";
                    //echo $arr['code']."--".$arr['class_name']."<br/>";
                }                
            ?>
            <input type= submit name="submit"/>
        </form>        
    </div>
    <?php 
        mysqli_close($conn);
    ?>
</body>

</html>
