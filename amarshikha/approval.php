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
        if( !isset($_SESSION['admin']) || $_SESSION['admin'] == 0){
            if(!isset($_SESSION['mail']) && !isset($_SESSION['pass'])){
                include 'NavigateBar.php';
            }
            if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
                include 'NavigateBarCont.php';
            }
            echo "<div style=\"margin-left:25%;padding:1px 16px;height:1000px;\">";
            echo "<p>Please, login <a href='login.php'>here</a> as an ADMIN to view this page.</p>";
            echo "</div>";
        }else{
            if(isset($_GET['id'])){
                $sql_up = "update tutorial set approve = 1 where id = '{$_GET['id']}' ";
                $res = mysqli_query($conn,$sql_up);
                
                //mysqli_free_result($res);                
                
                $sql = "select writer from tutorial where id = '{$_GET['id']}' ";
                $res = mysqli_query($conn,$sql);
                $writer;
                while($temp = mysqli_fetch_array($res,MYSQLI_ASSOC)){
                    $writer = $temp['writer'];
                }
                
                //mysqli_free_result($res);                
                
                $sql_con = "update account_info set contribution = contribution + 1 where username = '{$writer}' ";
                                
                $res = mysqli_query($conn,$sql_con);
            }
            include 'NavigateBarAdmin.php';            
            echo "<div style=\"margin-left:25%;padding:1px 16px;height:1000px;\">";
            $sql = "select * from tutorial where approve = 0";
            $arr = mysqli_query($conn,$sql);
            
            $row = mysqli_num_rows($arr);
            
            if($row>0){
                echo "<table>";
                while($result = mysqli_fetch_array($arr,MYSQLI_ASSOC)){
                    echo "<tr>";
                    echo "<td>Title</td>";
                    echo "<td>{$result['title']}</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Content</td>";
                    echo "<td>{$result['content']}</td>";
                    echo "<td><a href =\"approval.php?id={$result['id']}\">Approve</a></td>";
                    echo "</tr>";
                }
                echo "</table>";                       
            }else echo "<h3>No pending post.</h3>";
            echo "</div>";
        }        
        mysqli_close($conn);
    ?>
</body>

</html>
