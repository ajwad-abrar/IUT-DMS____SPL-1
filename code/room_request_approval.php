<?php
session_start();


$con =mysqli_connect('localhost', 'root','190042106');
if(!$con){
    echo 'connection error'.mysqli_connect_error();
  }


mysqli_select_db($con, 'iut_dms');



if(isset($_POST['approve'])){

    //$approve=mysqli_real_escape_string($con,$_POST['approve']);

    $sql="UPDATE `room_request` SET `provost_approval` = 'Approved' ;";

  

if(mysqli_query($con, $sql)){
    header('Location: provost_room_request.php');
}
else{
    echo'query error'.mysqli_error($con);
}



}


?>