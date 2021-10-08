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





include('student_photo.php');

	function getImagePath(){

		$con = mysqli_connect('localhost', 'root','190042106', 'iut_dms');


		$email = $_SESSION['email'];

		$reg= "select img_path from student where email= '$email'";

		$result = mysqli_query($con, $reg);

		while($row = mysqli_fetch_assoc($result)){
			return "{$row['img_path']}";
		}
	}

	$imagePath = getImagePath();



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
	  <link rel="stylesheet" href="CSS/resource_request_student.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  

    <title>Resource Request</title>

</head>

<body>
   
   <div class="wrapper">
      <nav id="sidebar">
      
   		<div class="sidebar-header">

       <div class="container">
				  <a href="#"> <img src="<?php echo $imagePath ?>" id="profile_picture"></a>
			 </div>
              
           <h4>

              <?php

                function showName(){

                    $con =mysqli_connect('localhost', 'root','190042106', 'iut_dms');


                    $email = $_SESSION['email'];

                    $reg=" select name from student where email= '$email'";


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
      
      
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="m-2 p-3 border border-warning" method="POST" enctype="multipart/form-data">
				
              <div class="mb-3">

                <label class="form-label label-style" for="customFile">Upload Your Profile Picture</label> <br>
                <input type="file" accept="image/*" class="form-control" id="customFile" name="stu_profile_pic" required> <br>

                <!-- <label for="" class="label-style">Name</label>
                <input type="text" placeholder="Enter your name" class="form-control" name="student_name" required> <br>  -->
                
              </div>

              <button class="btn btn-info" name="update_student_profile" value="s_up_profile">Submit</button>


            </form>
      
            </div>
      
            <div class="modal-footer">
      
          
      
            </div>
      
          </div>
        </div>
        </div>


        <!-- Update Profile Modal ends -->




      <!-- Update Profile PHP Code starts -->

		<?php
        /*
          if(isset($_POST['update_student_profile'])) {

              $servername = "localhost";
              $username = "root";
              $password = "190042106";
              $dbname = "iut_dms";

              // Create connection
              $conn = mysqli_connect($servername, $username, $password, $dbname);

              $name = $_POST['student_name'];
              $email = $_SESSION['email'];

              // Check connection
              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }

              $sql = "UPDATE student SET name = '$name' WHERE email = '$email'";

              if (mysqli_query($conn, $sql)) {
                echo "";
              } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }


              mysqli_close($conn);

          }       */

      ?>




      <!-- Update Profile PHP Code Ends -->

   		
   		<ul class="list-unstyled components">
   		
   			<li>
   				<a href="student_home.php" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-house-door-fill mx-2" viewBox="0 0 16 16">
            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
          </svg>  Home</a>
   		
   			</li>

        <li>
				  <a href="student_profile.php" >  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-person-fill mx-2" viewBox="0 0 16 16">
  				<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
				  </svg>  Profile </a>
   			</li>   
   			
   			<li>
   				<a href="student_room_request.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-person-plus-fill mx-2" viewBox="0 0 16 16">
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
          </svg>   Room Request</a>
   			</li>
   			<li>
   				<a href="student_announcement.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-megaphone-fill mx-2" viewBox="0 0 16 16">
            <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-11zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25.222 25.222 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56V3.224zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009a68.14 68.14 0 0 1 .496.008 64 64 0 0 1 1.51.048zm1.39 1.081c.285.021.569.047.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a65.81 65.81 0 0 1 1.692.064c.327.017.65.037.966.06z"/>
          </svg> Announcement</a>
   				
   			</li>
   			<li class="active">
   				<a href="student_resource_request.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-patch-check-fill mx-2" viewBox="0 0 16 16">
            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
          </svg> Resource Request</a>

          <li>
            <a href="student_meal.php" class="text-light text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-x-circle-fill mx-2" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
            </svg> Meal Cancellation </a>
       </li> 
       
       
   			</li>
               <li>
                <a href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-box-arrow-left mx-2" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                </svg> Logout</a>
            </li>
   			
   		</ul>
   		
   	</nav>
   	
   	<div class="content" id="prb">
       
   		<nav class="navbar navbar-expand-lg navbar-light bg-light">
   	
        <button type="button" id="sidebarCollapse" class="btn btn-info">
          <i class="fa fa-align-justify"></i> <span>Menu</span>
        </button>
      
  
      </nav>
  

           
    <div class="other-section">
    
      <div>

        <ul class="nav nav-tabs">
      
          <li class="nav-item "><a data-toggle="tab" class="nav-link active" href="#inbox">Request</a></li>
      
        </ul>

      </div>
  
      
    
    <div class="tab-content">

      <div id="inbox" class="tab-pane active jumbotron"><p></p>

		  	<div id="choose_resource"><h1 class="text-center">Choose a resource you want to request: </h1></div>


          <form action="student_resource_request.php"  class="resource_rqst" method="POST">

			    <div class="container mt-5">
				  <div class="row">
					

					<div class="col-md-5" style="margin-right: 15%;">

						<h4 class="text-center">Resource Type</h4>

						<select name="resource_type" id="main_menu" class="custom-select">
							
							<option value="choose" selected>Select </option>
							<option value="electrical">Electrical</option>
							<option value="stationary">Stationary</option>
							<option value="bed">Bed Related</option>

		
						</select>

					</div>

					<div class="col-md-5">

						<h4 class="text-center">Resource Name</h4>

						<select name="resource_name" id="sub_menu" class="custom-select">
						</select>
		
		
					</div>

      

          </div>
      
        </div>

        <div class="text-center mt-5">
				<button onclick="requestSubmission()"  type="submit" name="submit" class="btn btn-success btn-lg" id="submit_button">Submit</button>
			</div>


        </form>

        <?php
      
      function showStatus(){

        $con = mysqli_connect("localhost","root","190042106","iut_dms");
        $email = $_SESSION['email'];
        $app=" select provost_approval,resource_name from resource_request where email= '$email'";
       $status = mysqli_query($con, $app);

      //  $roomcount = "SELECT COUNT(room_no) AS count FROM room_request WHERE room_no = '$room_number' AND hall_name= '$hall_name'";
      // $countcheck = mysqli_query($con, $roomcount);
      // $row2 = mysqli_fetch_assoc($roomcount);

        echo "<br>";

        while($row = mysqli_fetch_assoc($status)){
         
         if($row['provost_approval'] =="Approved"){
          
        //  echo '<div class="alert alert-success alert-dismissible fade show p-3 text-center" role="alert"><b> Your Request Has Been Approved</b></div>';
            

        echo '<div class="alert alert-success alert-dismissible text-center">
        <button type="button" class="close" data-dismiss="alert">&times;</button>'.
        '<strong>Success!</strong>'. " Your request for ". "<b>".$row['resource_name']."</b>". " has been approved".
      '</div>';
                   
          
         }
          else if($row['provost_approval'] ==""){

            // echo '<div class="alert alert-warning p-3 text-center" role="alert"><b>Your request is pending</b></div>';
            
            echo '<div class="alert alert-warning alert-dismissible text-center">'.
         " Your request for ". "<b>".$row['resource_name']."</b>". " is pending".
      '</div>';
          }

        
        }


        
          
       
      }


      
      showStatus();
      

      ?>    
			

       
     
		</div>


     </div>

     

    
   
     <!--annnouncement modal-->
			


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script>
	    $(document).ready(function(){
			$('#sidebarCollapse').on('click',function(){
				$('#sidebar').toggleClass('active');
			});
		});  
	</script>

<script>
function requestSubmission(){
  alert('Request Submitted');

}


</script>


	<script src="JS/resource_request.js"></script>
    
    
    
    
    
  </body>
</html>