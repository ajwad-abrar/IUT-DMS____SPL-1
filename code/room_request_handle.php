<?php
session_start();


$con =mysqli_connect('localhost', 'root','');

mysqli_select_db($con, 'iut_dms');
$email=$_SESSION['email'];
//$name= $_SESSION ['name'];

if(isset($_POST['submit'])){

    $hall_name=mysqli_real_escape_string($con,$_POST['hall_name']);
    $floor_number=mysqli_real_escape_string($con, $_POST['floor_number']);
    $room_number=mysqli_real_escape_string($con, $_POST['room_number']);
    $bed_number=mysqli_real_escape_string($con, $_POST['bed_number']);
  

$sql="INSERT INTO `room_request` (`request_ID`, `request_time`, `email`, `hall_name`, `level`, `room_no`, `bed`, `provost_approval`, `provost_approval_time`)
 VALUES (NULL, current_timestamp(), '$email', '$hall_name', '$floor_number', '$room_number', '$bed_number', '', NULL);";


if(mysqli_query($con, $sql)){
    header('Location: student_room_request.php');
}
else{
    echo'query error'.mysqli_error($con);
}

}

?>