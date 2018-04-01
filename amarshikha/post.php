<!doctype html>

<html lang="en">
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="style1.css">
<link type="text/css" rel="stylesheet" href="http://jqueryte.com/css/jquery-te.css" charset="utf-8">
<link type="text/css" rel="stylesheet" href="http://jqueryte.com/css/jquery-te-green.css" charset="utf-8">
<link type="text/css" rel="stylesheet" href="http://jqueryte.com/css/jquery.snippet.min.css" charset="utf-8">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="src/jquery-te-1.4.0.min.js" charset="utf-8"></script>
<script type="text/javascript" src="http://jqueryte.com/js/jquery.snippet.min.js" charset="utf-8"></script>
<script type="text/javascript" src="http://jqueryte.com/js/site.js" charset="utf-8"></script>


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
        }else{
            if($_SESSION['admin'] == 1) include 'NavigateBarAdmin.php';
            else include 'NavigateBarCont.php';
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $title = valid($_POST['title']);
                $content = addslashes($_POST['content']);
                $class = valid($_POST['class']);
                $subject = valid($_POST['subject']);
                $chapter = valid($_POST['chapter']);
                $arr = mysqli_query($conn,"select username from account_info where mail_id = '{$_SESSION['mail']}' ");
                
                while($res = mysqli_fetch_array($arr,MYSQLI_ASSOC)){
                    $username = $res['username'];
                }
                $date = date("Y-m-d");
                $approve = 0;
                if($_SESSION['admin'] == 1){
                    $approve = 1;
                    $sql_con = "update account_info set contribution = contribution + 1 where mail_id = '{$_SESSION['mail']}' ";
                                
                    $res = mysqli_query($conn,$sql_con);
                }
                
                $sql = "INSERT INTO tutorial(class_code,subject_code,chapter_code,title,content,writer,date,approve) values ('$class','$subject','$chapter','$title','$content','$username','$date','$approve')";
                if(mysqli_query($conn,$sql)){
                    echo "<div style=\"margin-left:25%;padding:1px 16px;height:1000px;\">";
                    echo "Successfully posted....";
                    echo "</div>";
                }else{
                    header("location: post.php");
                }
            }else{
    ?>
        <div style="margin-left:25%;padding:1px 16px;height:1000px;">
            <!--<div>-->
            <h2>Post Your Tutorial: </h2>

            <form action="" method="post" id="likha">
                <textarea rows="1" cols="90" name="title" placeholder="Title..."></textarea>
                <textarea rows="20" cols="90" class="Content" name="content" placeholder="write your content here..."></textarea>
                <br/>


                <script>
                    $(document).ready(function() {
                        $('.Content').jqte();
                        //$('.content').trumbowyg();
                    });

                </script>


                <?php
                    $sql_chapter = "select *from chapter";
                    $sql_class = "select *from class";
                    $sql_subject = "select *from subject";
                    //class selection
                    $result = mysqli_query($conn,$sql_class);
                    echo "Class : "; 
                    echo "<select name = \"class\">";
                    echo "<option>---select class---</option>";
                    while($arr = mysqli_fetch_array($result,MYSQLI_ASSOC)){                    
                        echo "<option value=\"{$arr['code']}\">{$arr['class_name']}<br>";
                        //echo $arr['code']."--".$arr['class_name']."<br/>";
                    }
                    echo "</select>&nbsp";
                    //subject selection
                    $result = mysqli_query($conn,$sql_subject);
                    echo "Subject : "; 
                    echo "<select name = \"subject\">";
                    echo "<option>---select subject---</option>";
                    while($arr = mysqli_fetch_array($result,MYSQLI_ASSOC)){                    
                        echo "<option value=\"{$arr['code']}\">{$arr['subject_name']}<br>";
                        //echo $arr['code']."--".$arr['class_name']."<br/>";
                    }
                    echo "</select>&nbsp";
                    //chapter selection
                    $result = mysqli_query($conn,$sql_chapter);
                    echo "Chapter : "; 
                    echo "<select name = \"chapter\">";
                    echo "<option>---select chapter---</option>";
                    while($arr = mysqli_fetch_array($result,MYSQLI_ASSOC)){                    
                        echo "<option value=\"{$arr['code']}\">{$arr['chapter_name']}<br>";
                        //echo $arr['code']."--".$arr['class_name']."<br/>";
                    }
                    echo "</select>&nbsp";
                ?>
                    <br/><br/><br/>
                    <input type="submit" name="submit" value="POST" />
            </form>
        </div>
        <?php
            }
        }
        mysqli_close($conn);
        ?>
</body>

</html>
