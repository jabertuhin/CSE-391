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
    ?>
    <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        <p>Please, login <a href='login.php'>here</a></p>
    </div>
    <?php
        }else if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
        }else{
            if($_SESSION['admin'] == 1) include 'NavigateBarAdmin.php';
            else include 'NavigateBarCont.php';                                            
    ?>
        <div style="margin-left:25%;padding:1px 16px;height:1000px;">
            <h2>Post Your Tutorial: </h2>
            <textarea rows="1" cols="90" name="title" form="likha" placeholder="Title..."></textarea>
            <textarea rows="20" cols="90" name="content" form="likha" placeholder= "write your content here..."></textarea>
            <form action="" method="post" name="likha">
                <?php
                    $sql_chapter = "select *from chapter";
                    $sql_class = "select *from class";
                    $sql_subject = "select *from subject";
                    //class selection
                    $result = mysqli_query($conn,$sql_class);
                    echo "Class : "; 
                    echo "<select name = \"class\">";
                    echo "<option>---slect class---</option>";
                    while($arr = mysqli_fetch_array($result,MYSQLI_ASSOC)){                    
                        echo "<option value=\"{$arr['code']}\">{$arr['class_name']}<br>";
                        //echo $arr['code']."--".$arr['class_name']."<br/>";
                    }
                    echo "</select>&nbsp";
                    //subject selection
                    $result = mysqli_query($conn,$sql_subject);
                    echo "Subject : "; 
                    echo "<select name = \"subject\">";
                    echo "<option>---slect subject---</option>";
                    while($arr = mysqli_fetch_array($result,MYSQLI_ASSOC)){                    
                        echo "<option value=\"{$arr['code']}\">{$arr['subject_name']}<br>";
                        //echo $arr['code']."--".$arr['class_name']."<br/>";
                    }
                    echo "</select>&nbsp";
                    //chapter selection
                    $result = mysqli_query($conn,$sql_chapter);
                    echo "Chapter : "; 
                    echo "<select name = \"chapter\">";
                    echo "<option>---slect chapter---</option>";
                    while($arr = mysqli_fetch_array($result,MYSQLI_ASSOC)){                    
                        echo "<option value=\"{$arr['code']}\">{$arr['chapter_name']}<br>";
                        //echo $arr['code']."--".$arr['class_name']."<br/>";
                    }
                    echo "</select>&nbsp";
                ?>
                <br/><br/><br/>
                    <input type="submit" name="submit" value = "POST"/>
            </form>
        </div>
        <?php
        }
        mysqli_close($conn);
    ?>
</body>

</html>
