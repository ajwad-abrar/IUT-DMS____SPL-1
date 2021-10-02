<?php
session_start();


$con =mysqli_connect('localhost', 'root','190042106');

mysqli_select_db($con, 'iut_dms');
$email=$_SESSION['email'];
//$name= $_SESSION ['name'];

if(isset($_POST['submit'])){

    $resource_type=mysqli_real_escape_string($con,$_POST['resource_type']);
    $resource_name=mysqli_real_escape_string($con, $_POST['resource_name']);


    $sql="INSERT INTO `resource_request` (`request_ID`, `request_time`, `email`, `resource_type`, `resource_name`, `provost_approval`, `provost_approval_time`)
    VALUES (NULL, current_timestamp(), '$email', '$resource_type', '$resource_name','', NULL);";
   
   
      if(mysqli_query($con, $sql)){
         

       header('Location: student_resource_request.php');
       }
      else{
       echo'query error'.mysqli_error($con);
      }


}
  
?>