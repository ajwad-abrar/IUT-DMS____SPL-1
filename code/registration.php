
<?php

session_start();


$con =mysqli_connect('localhost', 'root','190042106');

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
	 $query3 = " select * from admin where email = '$email' ";


	 $result1 = mysqli_query($con, $query1);
	 $result2 = mysqli_query($con, $query2);
	 $result3 = mysqli_query($con, $query3);

	 $num1 = mysqli_num_rows($result1);
	 $num2 = mysqli_num_rows($result2);
	 $num3 = mysqli_num_rows($result3);

	 if($num1 == 1 or $num2 == 1 or $num3 ==1){
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

				else if(($role == "Provost")){
					
					$reg2 = " insert into provost(name, programme, gender, email, password) 
					values('$name', '$dept', '$gender', '$email', '$hashed_password')" ;

					mysqli_query($con, $reg2);
					header('location:login.php');
					echo '<script type="text/javascript"> alert("Registration Successful"); </script> ';


				}

				else{
					$reg3 = " insert into admin(name, gender, email, password) 
					values('$name', '$gender', '$email', '$hashed_password')" ;

					mysqli_query($con, $reg3);
					header('location:login.php');
					echo '<script type="text/javascript"> alert("Registration Successful"); </script> ';
				}
			

			
			
			
			
		}

		else{
		  echo "password does not match";
		}
		 
	 }



?>
