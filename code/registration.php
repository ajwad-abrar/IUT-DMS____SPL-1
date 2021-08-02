
<?php

session_start();


$con =mysqli_connect('localhost', 'root','190042106');

mysqli_select_db($con, 'login_system');
      
     $role=$_POST["role"];
     $name = $_POST["name"];
	 $s_id= $_POST["s_id"];
	 $dept = $_POST["dept"];
	 $gender= $_POST["gender"];
     $email = $_POST["email"];
     $password = $_POST["pwd"];
     $cpassword= $_POST["cpwd"];

     $hashed_password= password_hash($password, PASSWORD_DEFAULT);

	 $s=" select * from login where email='$email' ";

	 $result= mysqli_query($con, $s);

	 $num= mysqli_num_rows($result);

	 if($num==1){
		 echo"Email already used";
	 }

	 else{
        if($cpassword==$password){
			$reg=" insert into login(role,name,student_ID,programme,gender,email,password) 
			values('$role','$name','$s_id','$dept','$gender','$email', '$hashed_password')" ;

			mysqli_query($con, $reg);
			header('location:login.php');
			echo '<script type="text/javascript"> alert("Registration Successful"); </script> ';
			
		}

		else{
			echo "ERROR!!!";
		}
		 
	 }

?>
