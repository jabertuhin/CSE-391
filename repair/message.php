<?php

require 'connect.php';

function val($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error);
} 

$name = val($_POST['name']);
$address = val($_POST['address']);
$phone = val($_POST['phone_number']);
$car_license = val($_POST['car_license']);
$engine = val($_POST['engine_number']);
//-----
$mechanic = val($_POST['mechanic']);
$date = val($_POST['date']);

$mechanic_work = mysqli_query($conn,'Select count(id) from assigned_work where ID = $$mechanic and assigned_date = $date');

if($mechanic_work>=4){
    echo '<h2>Try another DATE. We are Sorry.</h2>';
}else{
    $store = "INSERT INTO order_info values ('$name','$address','$phone','$car_license','$engine')";
    mysqli_query($conn,"INSERT INTO assigned_work values ('$mechanic','$engine','$date')");
    if (mysqli_query($conn, $store)) {
        echo "Hope to see you on <strong>{$date}</strong>";
        echo "<br/>";
    }else {
        echo "Error: " . $store . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);  

?>
