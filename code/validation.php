<?php

session_start();
header('location:login.php');

$con =mysqli_connect('localhost', 'root','190042106');

mysqli_select_db($con, 'login_system');

     $name = $_POST["name"];
     $email = $_POST["email"];
     $password = $_POST["pwd"];
     $cpassword= $_POST["cpwd"];
	 $s=" select * from login where email='$email' ";

	 $result= mysqli_query($con, $s);

	 $num= mysqli_num_rows($result);

	 $_SESSION['email'] = $email;

	 if($num == 1){
		 while($row= mysqli_fetch_assoc($result)){
			 if(password_verify($password, $row['password'])){
				// $_SESSION['username']=$name;
				// $_SESSION['email']=$email;
				header('location:boot_home.php');
			 }
		 }
       
	 }

	 else{

        echo '<script>alert("Wrong Password")</script>';
        header('location:login.php');
		 
	 }

?>
