
<?php
session_start();
?>


<!doctype html>
<html lang="en">

  <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<link rel="stylesheet" href="boot_style.css">
	<link rel="stylesheet" href="CSS/student_home_style.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<title>Home</title>
  </head>

  <body>
   
   <div class="wrapper">
   	<nav id="sidebar">
	  
   		<div class="sidebar-header">

			<div class="container">
				<a href="#"> <img src="images/ajwad_student.jpg" id="profile_picture"></a>
			</div>
			  

   			<h4>
				   
			   <?php

					function showName(){

						$con =mysqli_connect('localhost', 'root','190042106', 'iut_dms');


						$email = $_SESSION['email'];
	
						$reg=" select name from admin where email= '$email'";
	
	
						$result = mysqli_query($con, $reg);

						echo "<br>";
	
						while($row = mysqli_fetch_assoc($result)){
							echo "{$row['name']}";
						}
					}

					showName();


				?>

			   
			   </h4>


			<button type="button" class="btn btn-light mx-5" data-toggle="modal" data-target="#try" id="update_button">Update</button>

   		</div>


		   <!-- UPDATE PROFILE MODAL-->

		   <div class="modal fade" id="try">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content">
	  
						<div class="modal-header ">
							<h4 class="modal-title w-100 text-center label-style">Update Information</h4>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
		
						<div class="modal-body">
		
		
							<form action="admin_home.php" class="m-2 p-3 border border-warning" method="POST">
			
								<div class="mb-3">

									<label class="form-label label-style" for="customFile">Upload Your Profile Picture</label> <br>
									<input type="file" class="form-control" id="customFile"> <br>

									<label for="" class="label-style">Name</label>
									<input type="text" placeholder="Enter your name" class="form-control" name="admin_name" required> <br> 
									
								</div>

								<button class="btn btn-info" name="update_profile">Submit</button>


							</form>    
		
						</div>
	  
						<div class="modal-footer">
		
				
		
						</div>
	  
					</div>
				</div>
		  </div>



		  
   		
   		<ul class="list-unstyled components">
   		
   			<li>
   				<a href="admin_home.php" >  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-house-door-fill mx-2" viewBox="0 0 16 16">
				<path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
		  		</svg>  Home  </a>
   		
   			</li>

			   <li>
				<a href="admin_profile.php" >  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-person-fill mx-2" viewBox="0 0 16 16">
  				<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
				</svg>  Profile </a>
   		
   			</li>   
   			
   			

			<li  class="active">
            		<a href="admin_meal.php" class="text-light text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-x-circle-fill mx-2" viewBox="0 0 16 16">
              		<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
            		</svg> Meal Cancellation </a>
         	</li>


			<li>
				  <a href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-box-arrow-left mx-2" viewBox="0 0 16 16">
				  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
				  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
				  </svg> Logout </a>
			</li>
   			
   		</ul>
   		
   	</nav>
   	
   	<div class="content">
   		<nav class="navbar navbar-expand-lg navbar-light bg-info p-2">
   		<div class="menubg">
		<button type="button" id="sidebarCollapse" class="btn btn-light">
		  <i class="fa fa-align-justify"></i> <span>Menu</span>
		</button>
	   </div>
   		
   		
	</div>





	<?php

      if(isset($_POST['update_profile'])) {

          $servername = "localhost";
          $username = "root";
          $password = "190042106";
          $dbname = "iut_dms";

          // Create connection
          $conn = mysqli_connect($servername, $username, $password, $dbname);

          $name = $_POST['admin_name'];
		  $email = $_SESSION['email'];

          // Check connection
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          $sql = "UPDATE admin SET name = '$name' WHERE email = '$email'";

          if (mysqli_query($conn, $sql)) {
            echo "";
          } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }


          mysqli_close($conn);

        }

    ?>	


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



	<script>
	  

		$(document).ready(function(){
			  $('#sidebarCollapse').on('click',function(){
				  $('#sidebar').toggleClass('active');
			  });
		  });  
	</script>
	
		
	
	
  </body>
</html>