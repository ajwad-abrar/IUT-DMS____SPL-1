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
    <link rel="stylesheet" href="provost_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  

    <title>announcement</title>

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
      color: blue;
    }
    </style>


  </head>



  <body>

   
    <?php

        function showName(){

          $con =mysqli_connect('localhost', 'root','190042106', 'iut_dms');


          $email = $_SESSION['email'];

          $reg=" select name from provost where email= '$email'";


          $result = mysqli_query($con, $reg);

          echo "<br>";

          while($row = mysqli_fetch_assoc($result)){
            echo "{$row['name']}";
          }
        }

    ?>



   
   <div class="wrapper">
   	<nav id="sidebar">
      
   		<div class="sidebar-header">

         <div class="container">
          
            <a href="#" ><img src="mine.jpg" class="profile_img"></a>
         </div>
              
          <br><br><br><br>

          <h4 class="text-center">
          
            <?php showName(); ?>
 
         </h4>

        <button type="button" class="btn btn-light mx-5" data-toggle="modal" data-target="#try">Update</button>

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
      
      
              <form action="" class="m-2 p-3 border border-warning">
      
                <div class="mb-3">
  
                  <label class="form-label label-style" for="customFile" style="color: black;">Upload Your Profile Picture</label> <br>
                  <input type="file" class="form-control" id="customFile"> <br>
      
                  <label for="" class="label-style" style="color: black;">Name</label>
                  <input type="text" placeholder="Enter your name" class="form-control" required> <br>
  
                  <label for="" class="label-style" style="color: black;">Student ID</label>
                  <input type="number" placeholder="Enter your ID" class="form-control" required> 
  
                  <br>
      
                  <label for="" class="label-style" style="color: black;">Email</label>
                  <input type="email" placeholder="Enter your email" class="form-control" required> 
      
                  <small id="emailHelp" class="form-text text-muted">Make sure to enter your IUT email address.</small> 
      
                  <br> 
  
                  <label for="" class="label-style" style="color: black;">Gender</label> <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gendercheck" value="option1"">
                    <label class="form-check-label checkbox-style" for="inlineRadio1"  style="color: crimson;">Male</label>
                  </div>
  
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gendercheck" value="option2">
                    <label class="form-check-label checkbox-style" for="inlineRadio2"  style="color: crimson;;">Female</label>
                    </div>
  
                    <br> <br>
                   
      
                  <label for="" class="label-style" style="color: black;">Role</label> <br>
      
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label checkbox-style" for="inlineRadio1"  style="color: crimson;">Student</label>
                  </div>
      
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label checkbox-style" for="inlineRadio2"  style="color: crimson;">Provost</label>
                  </div>
      
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label checkbox-style" for="inlineRadio2"  style="color: crimson;">Admin</label>
                  </div>
      
                  <p></p>  
      
                  <label for="" class="label-style" style="color: black;">Password</label>
                  <input type="password" placeholder="Enter your Password" class="form-control" required> <p></p>
      
                  <label for="" class="label-style" style="color: black;">Confirm Password</label>
                  <input type="password" placeholder="Confirm your Password" class="form-control" required> <p></p>
      
      
                  
      
                </div>
      
                <button class="btn btn-info">Submit</button>
    
      
              </form>    
      
            </div>
      
            <div class="modal-footer">
      
          
      
            </div>
      
          </div>
        </div>
        </div>


      <!-- Update Profile Modal ends -->



   		
   		<ul class="list-unstyled components">
   		
   			<li>
   				<a href="provost_home.php" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-house-door-fill mx-2" viewBox="0 0 16 16">
            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
          </svg>  Home</a>
   		
   			</li>
   			
   			<li >
   				<a href="provost_room_request.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-person-plus-fill mx-2" viewBox="0 0 16 16">
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
          </svg>   Room Request</a>
   			</li>
   			<li  class="active">
   				<a href="#" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-megaphone-fill mx-2" viewBox="0 0 16 16">
            <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-11zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25.222 25.222 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56V3.224zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009a68.14 68.14 0 0 1 .496.008 64 64 0 0 1 1.51.048zm1.39 1.081c.285.021.569.047.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a65.81 65.81 0 0 1 1.692.064c.327.017.65.037.966.06z"/>
          </svg> Announcement</a>
   				
   			</li>
   			<li >
   				<a href="provost_resource_request.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-patch-check-fill mx-2" viewBox="0 0 16 16">
            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
          </svg> Resource Request</a>
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
      
           

   
     <!--Annnouncement modal starts here -->
	
     <div class="container">

    
      <!-- The Modal -->
      <div class="modal fade" id="annmod">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
            
              <h4 class="modal-title w-100 text-center label-style">Post Announcement</h4>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
            
              <form class="form-horizontal" action="provost_announcement.php" method="POST">
                <div class="form-group">
  
                  <div class="form-floating">
                      <label for="floatingTextarea1"> <b>Date of Announcement</b>  </label><br>
                      <input type="date" id="floatingTextarea1" style="height: 40px" name="date_of_post"></textarea>
                      
                    </div>
                    <br>
                    <div class="form-floating">
                      <label for="floatingTextarea3"> <b>Subject</b> </label>
                      <textarea class="form-control p-2" placeholder="Purpose of Announcement" id="floatingTextarea3"  name="subject_of_post"
                      
                      
                      style="
								
                        resize: none;
                        color: black;
                        border:black solid;
                        height: 50px;" ></textarea>
                    
                     
                    </div>         
                      
                    
                    
                    <br>

                  <div class="form-floating">
                      <label for="floatingTextarea2"> <b> Announcement</b></label>
                      <textarea class="form-control p-2" placeholder="Write an Announement" id="floatingTextarea2" name="message_of_post"
                      
                      style="

                      resize: none;
                      color: black;
                      border:black solid;
                      height: 200px;" > </textarea>
                      
                    
                     
                    </div>
                   <br>

                   <label class="form-label label-style" for="customFile" style="font-weight: 700;">Upload Relevant Attachment</label> <br>
                   <input type="file" class="form-control" id="customFile"> 
                  

                   <br> <br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people" id="user" viewBox="0 0 16 16">
                      <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                    </svg>
                    <h6 > &nbsp; It will appear to those who have access to IUTDMS</h6>
  
                    <br><br>
                <div class="form-group">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <button onclick="alert('Your announcement has been posted')" href="#ale" type="submit" class="btn btn-info" name="provost_post_announcement">Post</button>
  
                    
                  </div>
                </div>
              </form>
            </div>
            
            <!-- Modal footer -->
           
          </div>
        </div>
      </div>
      
    </div>
    
  
    <!--post announcement button-->

    
    <div class="container"> 
      <button type="button" class="btn btn-info " data-toggle="modal" data-target="#annmod">Post an announcement</button>
   </div>
   <br><br><br>



   <!---Previous announcement starts here-->

   <div class="other-section">
    <div>
  
      <ul class="nav nav-tabs">
      
        <li class="nav-item "><a data-toggle="tab" class="nav-link active mx-3" href="#inbox"> <b>Previous Announcements</b> </a></li>
          
      
        </ul>
  
    </div>


    <div class="tab-content">
      <div id="inbox" class="tab-pane active">

        <div class="container-fluid">
          <h2></h2>
          <div id="accordion">
            <div class="card">
              <div class="card-header">
                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                    Course Registration (21 june, 2021) 
                </a>
              </div>
              <div id="collapseOne" class="collapse" data-parent="#accordion">
                <div class="card-body" style="text-align: justify;">
                  This is to remind you that course registration exercise started on Monday,
                  19 April 2021 and it will end on Friday, 7 May 2021. A student who will not
                  have registered his/her semester courses in SIS system within this period,
                  may have problems of accessing course results eg quiz, assignments, tests
                  and later on semester results.           <br> <br>
                  Register NOW your courses offered for the semester one 2020-2021 A.Y to
                  avoid regrets.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                Lockdown (23 May,2021)
              </a>
              </div>
              <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body" style="text-align: justify;">
                  The Government of the Peoples’ Republic of Bangladesh has enforced "lockdown"
                  in; Gazipur, and the surrounding areas of Narayanganj, Manikganj, Madaripur,
                  Munshiganj, Gopalganj and Rajbari with effect from 6.00 AM tomorrow June 22 to
                  30 June 2021.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                  Academic Calendar 2020-2021 (12 April, 2021)
                </a>
              </div>
              <div id="collapseThree" class="collapse" data-parent="#accordion">
                <div class="card-body" style="text-align: justify;">
                  Academic Calendar for 2nd-4th Year Students Winter Semester, 2020-2021 A.Y. <br>
                  * Starting of Regular Courses (19 April, 2021)                              <br> 
                  * Eid ul Fitr Holiday (10 - 14 May, 2021)                                   <br>
                  * Classes Resume (17 May, 2021)                                             <br>
                  * End of classes before Mid-Semester Examination (11 June, 2021)            <br>
                  * Mid-Semester Examination (14 - 26 June, 2021)                             <br>
                  * Classes Resume after Mid-Sem Examination (28 June, 2021)                  <br>
                  * Eid ul Adha Holiday (19 - 23 July, 2021)                                  <br>
                  * End of Winter Semester Course Work (27 August, 2021)                      <br>
                  * Semester Final Examination (30 August - 18 September, 2021)               <br>
                </div>
              </div>
            </div>
          </div>
        </div>
        

      </div>
     </div> 

     </div>
    

  
  
    <!--ends here-->


    <!-- Announcement Table Creation Starts -->


		<?php

      if(isset($_POST['provost_post_announcement'])) {

          $servername = "localhost";
          $username = "root";
          $password = "190042106";
          $dbname = "iut_dms";

          // Create connection
          $conn = mysqli_connect($servername, $username, $password, $dbname);

          $date = $_POST['date_of_post'];
          $sub = $_POST['subject_of_post'];
          $message = $_POST['message_of_post'];
          $email = $_SESSION['email'];


          // Check connection
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          $sql = "INSERT INTO provost_announcement (subject, announcement_text, p_email) VALUES ( '$sub', '$message', '$email')";

          if (mysqli_query($conn, $sql)) {
            echo "";
          } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }


          mysqli_close($conn);

        }

    ?>	
    

    <!-- Announcement Table Creation Ends -->









    
    

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


    $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
	</script>
    
    
    
    
    
  </body>
</html>