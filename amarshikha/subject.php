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
    ?>  
    
    <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        <?php
            if(!isset($_GET['submit'])){
                header("location: class.php");
            }else{
        ?>
        <h2>Choose Your Subject</h2>
        <form action = '' method="get">
            <?php
                $sql = "select *from subject where class_code = {$_GET['cls']}";
                $result = mysqli_query($conn,$sql);                                
            
                while($arr = mysqli_fetch_array($result,MYSQLI_ASSOC)){                    
                    echo "<input type='radio' name='cls' value=\"{$arr['code']}\">{$arr['subject_name']}<br>";
                    //echo $arr['code']."--".$arr['class_name']."<br/>";
                }                
            ?>
            <input type= submit name="submit"/>
        </form>        
    </div>
    <?php 
        }
        mysqli_close();
    ?>
</body>

</html>
