   <!-- registration -->

<?php

	session_start();


	$con =mysqli_connect('localhost', 'root','190042106');

	mysqli_select_db($con, 'iut_dms');

  if(isset($_POST['register'])){
    $role=mysqli_real_escape_string($con,$_POST['role']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $s_id= mysqli_real_escape_string($con,$_POST['s_id']); 
    $dept = mysqli_real_escape_string($con,$_POST['dept']);
    $gender= mysqli_real_escape_string($con,$_POST['gender']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['pwd']);
    $cpassword= mysqli_real_escape_string($con,$_POST['cpwd']);
        
    
  
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
      echo '<div class="alert alert-danger alert-dismissible text-center">
      Email already used
     <button type="button" class="close" data-dismiss="alert">&times;</button>
   </div>';
    }
  
    else {
  
      if($cpassword == $password){
  
  
        if($role == "Student") {
  
          $reg1 = " insert into student(name, student_ID, programme, gender, email, password) 
          values('$name', '$s_id', '$dept', '$gender', '$email', '$hashed_password')" ;
  
          mysqli_query($con, $reg1);
          // header('location:login.php');
          echo '<div class="alert alert-success alert-dismissible text-center">
          Registration Successful!!!
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>';
        }
  
        else if(($role == "Provost")){
          
          $reg2 = " insert into provost(name, programme, gender, email, password) 
          values('$name', '$dept', '$gender', '$email', '$hashed_password')" ;
  
          mysqli_query($con, $reg2);
          // header('location:login.php');
          echo '<div class="alert alert-success alert-dismissible text-center">
          Registration Successful!!!
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>';
  
        }
  
        else{
          $reg3 = " insert into admin(name, gender, email, password) 
          values('$name', '$gender', '$email', '$hashed_password')" ;
  
          mysqli_query($con, $reg3);
        echo '<div class="alert alert-success alert-dismissible text-center">
        Registration Successful!!!
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>';
          // header('location:login.php');
          
        }			
        
      }
  
      else{
        echo '<div class="alert alert-danger alert-dismissible text-center">
         Password doesn not match 
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>';
      }
      
    }
  

	}


?>


    <!-- login and validation -->
    <?php

$con =mysqli_connect('localhost', 'root','190042106');

mysqli_select_db($con, 'iut_dms');

if(isset($_POST['submit'])){

  //$name = mysqli_real_escape_string($con,$_POST['name']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $password = mysqli_real_escape_string($con,$_POST['pwd']);
 // $cpassword= mysqli_real_escape_string($con,$_POST['cpwd']);
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

    else{
    echo  '<div class="alert alert-danger alert-dismissible text-center">
         Wrong Password
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>';

    }
  }
    
  } 
  
  elseif($numberOfRows2 == 1){
  
   while($row = mysqli_fetch_assoc($result2)){
  
     if(password_verify($password, $row['password'])){
      
        header('location:provost_home.php');
     }
     else{
      echo  '<div class="alert alert-danger alert-dismissible text-center">
           Wrong Password
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>';
  
      }
   }
   
  }
  
  elseif($numberOfRows3 == 1){
  
  while($row = mysqli_fetch_assoc($result3)){
  
   if(password_verify($password, $row['password'])){
    
      header('location:admin_home.php');
   }
   else{
    echo  '<div class="alert alert-danger alert-dismissible text-center">
         Wrong Password
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>';

    }
  }
  
  }
  
  
  
  
  else{
  
     echo "Wrong Password!!";
      
  
  }
  

}


?>







<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <title>Log In</title>

    <link rel="stylesheet" href="CSS/login-style.css">

    <!-- Animate css cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

  </head>
    
  <body>

    <section class="login">

        <div class="container">

          <div class="row g-0">

            <div class="col-lg-5">

              <a href="index.html" target="_blank"> <img src="images/student_home_img.jpg" class="img-fluid" alt="IUT image" title="Click to go to Home Page">  </a>
            
            </div>

            <div class="col-lg-7 text-center py-5">
              <h1 class="animate__animated animate__pulse animate__infinite">Welcome Back!</h1>

              <form action="login.php" method="post">

                <div class="form-row py-3 pt-5">
                 
          

                  <div class="offset-1 col-lg-10">
                    
                    <label for="email" class="label-class mx-4">Email </label>
                    
                    <input type="email" name="email" placeholder="Enter your email address" class="inp px-3" required>

                  </div>
                </div>

                <div class="form-row py-3">
                  <div class="offset-1 col-lg-10">

                    <label for="pwd" class="label-class mx-2">Password</label>
                    <input type="password" name="pwd" placeholder="Enter your password" class="inp px-3" required>

                  </div>
                </div>

                <div class="form-row">

                  <div class="offset-1 col-lg-10">

                    <input type="submit" name="submit" class="btn1" value="Log In">

                  </div>

                  <label class="remember pt-4">
                    
                    <input type="checkbox" checked="checked" name="remember"> Remember me

                  </label>

                </div>

              </form>

              <p class="pt-4">If you do not have an account, please    

                 <button class="btn btn-primary" data-toggle="modal" data-target="#try">Sign Up</button> 

              </p>
        
              

            </div>

          </div>

        </div>

    </section>



<!--register modal--->
<div class="modal fade" id="try">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
	  
					<div class="modal-header ">
						<h4 class="modal-title w-100 text-center label-style">Sign UP!</h4>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
	  
					<div class="modal-body">
	  
	  
						<form action="login.php" class="m-2 p-3 border border-warning" method="post">
	  
							<div class="mb-3">
	  
								<label for="" class="label-style">Name</label>
								<input type="text" name="name" placeholder="Enter your name" class="form-control" required> <br>

                
                <label class="label-style"><b>Role</b> </label><br> 
                <input type="radio" class="text-danger" name="role" value="Student"/>&nbsp; Student &nbsp;
                <input type="radio" class="text-danger" name="role" value="Provost"/>&nbsp; Provost &nbsp;
                <input type="radio" class="text-danger" name="role" value="Admin"/>&nbsp; Admin
						
	  
	              <br><br>
                <label for="" class="label-style">Student Id</label>
								<input type="number" minlength="9" maxlength="9" name="s_id" placeholder="Enter your Student ID" class="form-control"> <br>

                <b class="label-style"> Programme </b>
                
                <select class="form-select " name="dept"> 
                     
                  <option value="CSE">CSE</option>
                  <option value="EEE">EEE</option>
                  <option value="ME">ME</option>
                  <option value="CEE">CEE</option>
                  <option value="IPE">IPE</option>
                  <option value="BTM">BTM</option>

                </select>
                <br>

								<label for="" class="label-style">Email</label>
								<input type="email" name="email" placeholder="Enter your email" class="form-control" required> 
	  
								<small id="emailHelp" class="form-text text-muted">Make sure to enter your IUT email address.</small> 
	  
								<br><br>

						    <label class="label-style"><b>Gender</b> </label><br> 
                <input type="radio" class="text-danger" name="gender" value="Male"/> &nbsp; Male &nbsp;
                <input type="radio" class="text-danger" name="gender" value="Female"/ >&nbsp; Female
								
								  
								  <br> <br>
								 							
						
	  
								<label for="" class="label-style">Password</label>
								<input type="password" name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="At least one number & one uppercase & lowercase letter, & at least 8 or more characters" placeholder="Enter your Password" class="form-control" required> <p></p>
	  
								<label for="" class="label-style">Confirm Password</label>
								<input type="password" name="cpwd" placeholder="Confirm your Password" class="form-control" required> <p></p>
	  						
	  
							</div>
	  
							<button type="submit" name="register" class="btn btn-info">Submit</button>
              
	  
						</form>    
	  
					</div>
	  
					<div class="modal-footer">  
	  
					</div>
	  
				</div>
			</div>
		  </div>

  

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    

  </body>

</html>
 
