
<?php

session_start();


$con =mysqli_connect('localhost', 'root','');

mysqli_select_db($con, 'iut_dms');
      
     $role=$_POST["role"];
     $name = $_POST["name"];
	 $s_id= $_POST["s_id"]; 
	 $dept = $_POST["dept"];
	 $gender= $_POST["gender"];
     $email = $_POST["email"];
     $password = $_POST["pwd"];
     $cpassword= $_POST["cpwd"];

     $hashed_password= password_hash($password, PASSWORD_DEFAULT);

	 $query1 = " select * from student where email = '$email' ";
	 $query2 = " select * from provost where email = '$email' ";

	 $result1 = mysqli_query($con, $query1);
	 $result2 = mysqli_query($con, $query2);

	 $num1 = mysqli_num_rows($result1);
	 $num2 = mysqli_num_rows($result2);

	 if($num1 == 1 or $num2 == 1){
		 echo"Email already used";
	 }

	 else{

        if($cpassword == $password){


				if($role == "Student") {

					$reg1 = " insert into student(name, student_ID, programme, gender, email, password) 
					values('$name', '$s_id', '$dept', '$gender', '$email', '$hashed_password')" ;

					mysqli_query($con, $reg1);
					header('location:login.php');
					echo '<script type="text/javascript"> alert("Registration Successful"); </script> ';
				}

				else{
					
					$reg2 = " insert into provost(name, programme, gender, email, password) 
					values('$name', '$dept', '$gender', '$email', '$hashed_password')" ;

					mysqli_query($con, $reg2);
					header('location:login.php');
					echo '<script type="text/javascript"> alert("Registration Successful"); </script> ';


				}
			

			
			
			
			
		}

		else{
			echo "ERROR!!!";
		}
		 
	 }



?>
