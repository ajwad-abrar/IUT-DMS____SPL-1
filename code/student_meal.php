<?php

  session_start();

  $con =mysqli_connect('localhost', 'root','190042106');

  mysqli_select_db($con, 'iut_dms');
  $email=$_SESSION['email'];


  if(isset($_POST['submit'])){

      $start_date=mysqli_real_escape_string($con,$_POST['start_date']);
      $end_date=mysqli_real_escape_string($con, $_POST['end_date']);
      $reason = mysqli_real_escape_string($con, $_POST['reason']);
    
    

      
      $date1=date_create($start_date);
      $date2=date_create($end_date);

      $date_diff= date_diff($date1,$date2 );
      $difference= $date_diff->format("%a");

      $dt = date_format($date1,"Y-m-d");


      for($i=0; $i<($difference+1); $i++){

        $result_date= date("Y-m-d", strtotime("+$i day", strtotime($dt)));

          $sql="INSERT INTO `meal_cancellation` (`request_ID`, `request_time`, `email`, `start_date`, `end_date`, `reason`, `cancel_date`)
          VALUES (NULL, current_timestamp(), '$email', '$start_date', '$end_date','$reason', '$result_date');";

          if(mysqli_query($con, $sql)){   
            header('Location: student_meal.php');
            }
          else{
            echo'query error'.mysqli_error($con);
          }         
      } 
  }

?>





<?php

	include('student_photo.php');

	function getImagePath(){

		$con = mysqli_connect('localhost', 'root','190042106', 'iut_dms');


		$email = $_SESSION['email'];

		$reg= "select img_path from student where email= '$email'";

		$result = mysqli_query($con, $reg);

		while($row = mysqli_fetch_assoc($result)){

			if($row['img_path'] == ""){
			  return "student_profile_picture/student_default.jpg";
			}
	
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
    <link rel="stylesheet" href="CSS/meal_cancel_style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title>Meal cancellation</title>


    <style>

      #user{
          margin-left: 3px;
          float: left;
      }

      #prb{
          width: 100%;
      }
      .modal-title-ann{
          text-decoration: underline;
          color: rgb(71, 71, 201);
      }

      #post{
        border: none;
        outline: none;
        border-radius:50px;
        background-color: rgb(63, 148, 63);
        color: white;
        transition: 0.5s;
        margin-left: -15px;
      }

      #post:hover{
        background-color:crimson;
      }
      #floatingTextarea2{
        border: solid 2px rgb(153, 116, 14);
      }
     
    </style>

  </head>

  
  <body>
    <div class="wrapper">
      <nav id="sidebar">
       
        <div class="sidebar-header">

          <div class="container">
             <img src="<?php echo $imagePath ?>" id="profile_picture"></a>
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
              <h4 class="modal-title w-100 text-center" style="color: black; font-weight: 700;">Update Information</h4>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
      
            <div class="modal-body">
      
      
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="m-2 p-3 border border-warning" method="POST" enctype="multipart/form-data">
				
              <div class="mb-3">

                <label class="form-label" for="customFile" style="font-weight: bolder; color:black">Upload Your Profile Picture</label> <br>
                <input type="file" accept="image/*" class="form-control" id="customFile" name="stu_profile_pic" required> <br>

                <!-- <label for="" style="font-weight: bolder; color:black">Name</label>
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

        }     */

      ?>


        <!-- Update Profile PHP Code ends -->




 
        
        <ul class="list-unstyled components">
        
          <li>
            <a href="student_home.php" class="text-light text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-house-door-fill mx-2" viewBox="0 0 16 16">
             <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
           </svg> Home</a>
        
          </li>

          <li>
            <a href="student_profile.php" class="text-light text-decoration-none">  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-person-fill mx-2" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>  Profile </a>
          </li>   
   			
          
          <li>
            <a href="student_room_request.php" class="text-light text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-person-plus-fill mx-2" viewBox="0 0 16 16">
             <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
             <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
           </svg>  Room Request</a>
          </li>

          <li>
            <a href="student_announcement.php" class="text-light text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-megaphone-fill mx-2" viewBox="0 0 16 16">
             <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-11zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25.222 25.222 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56V3.224zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009a68.14 68.14 0 0 1 .496.008 64 64 0 0 1 1.51.048zm1.39 1.081c.285.021.569.047.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a65.81 65.81 0 0 1 1.692.064c.327.017.65.037.966.06z"/>
           </svg> Announcement</a>  
          </li>

          <li>
             <a href="student_resource_request.php" class="text-light text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-patch-check-fill mx-2" viewBox="0 0 16 16">
             <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
            </svg> Resource Request</a>
          </li>

          <li class="active">
            <a href="student_meal.php" class="text-light text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-x-circle-fill mx-2" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
            </svg> Meal Cancellation </a>
          </li>

          <li>
            <a href="logout.php" class="text-light text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-box-arrow-left mx-2" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
              <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg>  Logout </a>
          </li>
          
        </ul>
        
      </nav>
      <div class="content" id="prb">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
        <button type="button" id="sidebarCollapse" class="btn btn-info">
          <i class="fa fa-align-justify"></i> <span>Menu</span>
        </button>
        
  
   
 </nav>

    
    <!-- <div class="modal-body">
          
      <form class="form-horizontal" action="student_meal.php" method="POST">
        
        <div class="form-group">

          <div class="form-floating">
              <label for="floatingTextarea1" class="meal_header" style="padding-top: 25px; font-size: 22px">Start Date</label>
              <br>
               &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
               
              <input placeholder="Select Start Date" type="text" id="floatingTextarea1" name="start_date" required class="datepicker" autocomplete="off" style="height: 40px;" >
              <br><br>
              
            </div>
            
            <div class="form-floating">
              <label for="floatingTextarea1" class="meal_header" style="padding-top: 25px; font-size: 22px"> End Date</label><br>

              &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
              <input placeholder="Select End Date" type="text" id="floatingTextarea1" name="end_date" required class="datepicker" autocomplete="off" style="height: 40px"></textarea>
              
            </div>
           <br>
            
          <div class="form-floating">
            
              <label for="floatingTextarea2" class = "meal_header" style="padding-top: 25px; font-size: 22px">Reason for Meal Cancellation</label>
              <br><br><br>
              <textarea class="form-control p-2" placeholder="Write your reason/s" id="cancel_reason" required name="reason" maxlength = "150"></textarea>
             
          </div>
           <br>
       
          <div class="form-group">       
            <div class="col-sm-offset-2 col-sm-10">
              <button onclick="alert('Your meal has been cancelled for the particular day/days.')" href="#ale" type="submit"  class="btn btn-success btn-lg" id="post" name="submit">Submit</button>
           </div>
          </div>
        </div>
      </form>
    </div> -->



  <div class="container">
    <div class="row">
      <div class="col">
        <div class="modal-body">
              
          <form class="form-horizontal" action="student_meal.php" method="POST">
            
            <div class="form-group">

              <div class="form-floating">
                  <label for="floatingTextarea1" class="meal_header" style="padding-top: 25px; font-size: 22px">Start Date</label>
                  <br>
                  &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
                  
                  <input placeholder="Select Start Date" type="text" id="floatingTextarea1" name="start_date" required class="datepicker" autocomplete="off" style="height: 40px;" >
                  <br><br>
                  
              </div>
                
              <div class="form-floating">
                  <label for="floatingTextarea1" class="meal_header" style="padding-top: 25px; font-size: 22px"> End Date</label><br>

                  &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
                  <input placeholder="Select End Date" type="text" id="floatingTextarea1" name="end_date" required class="datepicker" autocomplete="off" style="height: 40px"></textarea>
                  
              </div>  <br>
                
              <div class="form-floating">
                
                  <label for="floatingTextarea2" class = "meal_header" style="padding-top: 25px; font-size: 22px">Reason for Meal Cancellation</label>
                  <br><br><br>
                  <textarea class="form-control p-2" placeholder="Write your reason/s" id="cancel_reason" required name="reason" maxlength = "150"></textarea>
                
              </div> <br>
          
              <div class="form-group">       
                <div class="col-sm-offset-2 col-sm-10">
                  <button onclick="alert('Your meal has been cancelled for the particular day/days.')" href="#ale" type="submit"  class="btn btn-success btn-lg" id="post" name="submit">Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>


      <div class="col" style="padding-left: 10%; border-left:5px solid green;">
          <img class="rounded mx-auto d-block" src="images/fac2.png"  height="420px" alt="Cafeteria" >
          <h4 class="text-justify" style="padding-top: 5%;">IUT has two self-service Cafeterias where the students take their breakfast and normal meals. 
          All residential students are provided with continental breakfast, lunch, evening tea and dinner. </h4>
      </div>
    </div>
  </div>




    	<!-- Meal Table Data Input starts -->

    <?php

      if(isset($_POST['student_cancel_meal'])) {

          $servername = "localhost";
          $username = "root";
          $password = "190042106";
          $dbname = "iut_dms";

          // Create connection
          $conn = mysqli_connect($servername, $username, $password, $dbname);

          $start_date = $_POST['start_date'];
          $end_date = $_POST['end_date'];
          $reason = $_POST['reason'];
          $email = $_SESSION['email'];


          // Check connection
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          $sql = "INSERT INTO student_meal (start_date, end_date, reason, s_email) VALUES ( '$start_date', '$end_date', '$reason', '$email')";

          if (mysqli_query($conn, $sql)) {
            echo "";
          } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }


          mysqli_close($conn);

      }

    ?>

      <!-- Meal Table Data Input Ends -->
   

      <script type="text/javascript">
   
   $('.datepicker').datepicker({ 
       startDate: new Date()
   });
 
</script>
        
  	  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
	    $(document).ready(function(){
			$('#sidebarCollapse').on('click',function(){
				$('#sidebar').toggleClass('active');
			});
		});  
	</script>



    
    </body>
   

 </html>   