<?php

session_start();
header('location:login.php');

$con =mysqli_connect('localhost', 'root','190042106');

mysqli_select_db($con, 'iut_dms');

     $name = $_POST["name"];
     $email = $_POST["email"];
     $password = $_POST["pwd"];
     $cpassword= $_POST["cpwd"];
	 $query1 = " select * from student where email='$email' ";
	 $query2 = " select * from provost where email='$email' ";
	 $query3 = " select * from admin where email='$email' ";

	 $result1 = mysqli_query($con, $query1);
	 $result2 = mysqli_query($con, $query2);
	 $result3 = mysqli_query($con, $query3);


	 $numberOfRows1 = mysqli_num_rows($result1);
	 $numberOfRows2 = mysqli_num_rows($result2);
	 $numberOfRows3 = mysqli_num_rows($result3);

	 $_SESSION['email'] = $email;

	if($numberOfRows1 == 1){

		 while($row = mysqli_fetch_assoc($result1)) {

			 if(password_verify($password, $row['password'])){
			
				header('location:student_home.php');
			 }
		 }
       
	} 

	elseif($numberOfRows2 == 1){

			while($row = mysqli_fetch_assoc($result2)){
   
				if(password_verify($password, $row['password'])){
			   
				   header('location:provost_home.php');
				}
			}
		  
	}
    
	elseif($numberOfRows3 == 1){

		while($row = mysqli_fetch_assoc($result3)){

			if(password_verify($password, $row['password'])){
		   
			   header('location:admin_home.php');
			}
		}
	  
}

	


	else{

        echo '<script>alert("Wrong Password")</script>';
        header('location:login.php');
		 
	 }

?>
