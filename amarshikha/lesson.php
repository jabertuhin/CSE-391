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
        echo "<div style=\"margin-left:25%;padding:1px 16px;height:1000px;\">";
    
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            echo "<h2>Tutorial:</h2><br/><br/>";
        
            $class = $_GET['class'];
            $subject = $_GET['subject'];
            $chapter = $_GET['chapter'];
            
            $tutorial = "select * from tutorial where class_code = '$class' and subject_code = '$subject' and chapter_code = '$chapter' ";
            $result = mysqli_query($conn,$tutorial);
            $row = mysqli_num_rows($result);
            
            if($row>0){
                while($temp = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    echo "<h3>{$temp['title']}</h3>";
                    echo "<p>{$temp['content']}</p>";
                    echo "<h5>created by {$temp['writer']} on {$temp['date']}</h5>";
                }
            }else{
                echo "<h2>Currently tutorials of this chapter is not available. Hope to upload very soon.</h2>";
            }                                    
            
        }else{
            echo "<h3>First choose your preferable class,subject,chapter <a href = \"tutorial.php\">here</a></h3>";
        }    
    
        //$sql = "select *from";
    
        echo "</div>";        
        mysqli_close($conn);
    ?>
</body>

</html>
