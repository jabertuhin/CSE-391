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
            <h2>Choose Your:</h2>
            <form action='lesson.php' method="get">
                <?php
                    $sql_chapter = "select *from chapter";
                    $sql_class = "select *from class";
                    $sql_subject = "select *from subject";
                    //class selection
                    $result = mysqli_query($conn,$sql_class);
                    echo "<h3>Class</h3>"; 
                    echo "<select name = \"class\">";
                    echo "<option>---select class---</option>";
                    while($arr = mysqli_fetch_array($result,MYSQLI_ASSOC)){                    
                        echo "<option value=\"{$arr['code']}\">{$arr['class_name']}<br>";
                        //echo $arr['code']."--".$arr['class_name']."<br/>";
                    }
                    echo "</select>";
                    //subject selection
                    $result = mysqli_query($conn,$sql_subject);
                    echo "<h3>Subject</h3>"; 
                    echo "<select name = \"subject\">";
                    echo "<option>---select subject---</option>";
                    while($arr = mysqli_fetch_array($result,MYSQLI_ASSOC)){                    
                        echo "<option value=\"{$arr['code']}\">{$arr['subject_name']}<br>";
                        //echo $arr['code']."--".$arr['class_name']."<br/>";
                    }
                    echo "</select>";
                    //class selection
                    $result = mysqli_query($conn,$sql_chapter);
                    echo "<h3>Chapter</h3>"; 
                    echo "<select name = \"chapter\">";
                    echo "<option>---select chapter---</option>";
                    while($arr = mysqli_fetch_array($result,MYSQLI_ASSOC)){                    
                        echo "<option value=\"{$arr['code']}\">{$arr['chapter_name']}<br>";
                        //echo $arr['code']."--".$arr['class_name']."<br/>";
                    }
                    echo "</select>";
                ?>
                    <br/><br/><br/>
                    <input type="submit" name="submit" />
            </form>
        </div>
        <?php         
        mysqli_close($conn);
    ?>
</body>

</html>
