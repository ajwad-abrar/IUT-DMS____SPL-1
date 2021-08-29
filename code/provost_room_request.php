<?php

session_start();

$con =mysqli_connect('localhost', 'root','190042106','iut_dms');
    
     if(!$con){
       echo 'connection error'.mysqli_connect_error();
     }

     
  

     $sql='SELECT email,hall_name, level, room_no, bed,request_time
     FROM `room_request`
     WHERE `provost_approval`= ""
     ORDER BY request_time DESC' ;

      $sql2='SELECT email,hall_name, level, room_no, bed,request_time
      FROM `room_request`
      WHERE `provost_approval`= "Approved"
      ORDER BY request_time DESC' ;

  

    $result=mysqli_query($con,$sql);
    $result2=mysqli_query($con,$sql2);
    

    $requests= mysqli_fetch_all($result,MYSQLI_ASSOC);
    $approved_requests= mysqli_fetch_all($result2,MYSQLI_ASSOC);
    

    mysqli_free_result($result);
    mysqli_free_result($result2);
  

    mysqli_close($con);

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
  

    <title>room request</title>

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


        .request_dp{
          border: 2px solid black;
          border-radius: 50%;
          padding: 5px;
          margin-right: 3px;
        }

    </style>
  </head>
  <body>


        
 <!-- <?php

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
  -->


   
   <div class="wrapper">
   	<nav id="sidebar">
      
   		<div class="sidebar-header">

           <div class="container">
            <a href="#" ><img src="mine.jpg" class="profile_img"></a>
           </div>
              
               <br><br><br><br>
   			        <h4 class="text-center"><?php showName(); ?></h4>

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

         <li>
   				<a href="student_information.php"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-person-plus-fill mx-2" viewBox="0 0 16 16">
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
          </svg> Student Information  </a>

   			</li>
   			
   			<li class="active">
   				<a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-person-plus-fill mx-2" viewBox="0 0 16 16">
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
          </svg>   Room Request</a>
   			</li>
   			<li>
   				<a href="provost_announcement.php" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-megaphone-fill mx-2" viewBox="0 0 16 16">
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
      
   	
  
  <!--<a class="navbar-brand" href="#">Navbar</a> -->
  
      </nav>
  

      <!--room request togglable tab-->
           
<div class="other-section">
  <div>

    <ul class="nav nav-tabs">
    
      <li class="nav-item "><a data-toggle="tab" class="nav-link active" href="#inbox"><b>Inbox</b></a></li>
      <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#archive"><b>Approved</b></a></li>
      <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#sent"><b>Room List</b></a></li>
    
      </ul>

  </div>
  
      
   
  

   <div class="tab-content">
       
       <div id="inbox" class="tab-pane active">
        
        <div class="list-group">
        <?php foreach ($requests as $request):  ?>

<a href="#" class="list-group-item list-group-item-action" aria-current="true">
  <div class=" w-100 justify-content-between">
    <img src="#" class="request_dp float-left">

    <h5 class="mb-1"><b><?php  echo htmlspecialchars($request['email']);?>, </b> is requesting for room <?php  echo htmlspecialchars($request['room_no']);?>,
  BED- <?php  echo htmlspecialchars($request['bed']);?>,
    <?php  echo htmlspecialchars($request['level']);?>,
     <?php  echo htmlspecialchars($request['hall_name']);?> hall</h5>

    <small class="text-muted">   <?php  echo htmlspecialchars($request['request_time']);?></small>
   
   
    <form action="room_request_approval.php" method="POST">

    <button   value="Approved" type="submit" class="btn btn-info float-right" id="post" name="approve" onclick="approval()">Approve</button>
   
    

    </form>
  </div>
</a>
<?php endforeach; ?>


      
        

        </div>

               

      </div>

                 
           
      


   <div id="archive" class="tab-pane"><p></p> <!--Approved requests-->
    <div class="list-group">

    <?php foreach ($approved_requests as $approved_request):  ?>

<a href="#" class="list-group-item list-group-item-action" aria-current="true">
  <div class=" w-100 justify-content-between">
    <img src="#" class="request_dp float-left">

    <h5 class="mb-1"><b> <?php  echo htmlspecialchars($approved_request['email']);?>,</b> had requested for room <?php  echo htmlspecialchars($approved_request['room_no']);?>,
  BED- <?php  echo htmlspecialchars($approved_request['bed']);?>,
    <?php  echo htmlspecialchars($approved_request['level']);?>,
     <?php  echo htmlspecialchars($approved_request['hall_name']);?> hall</h5>

    <small class="text-muted">   <?php  echo htmlspecialchars($approved_request['request_time']);?></small>
   
   
  <!--  <form action="room_request_approval.php" method="POST">

    <button   value="Approved" type="submit" class="btn btn-info float-right" id="post" name="approve" onclick="approval()">Approve</button>
   
    

    </form>
    -->
  </div>
</a>
<?php endforeach; ?>


     

    </div>

   
  </div>  <!--jdjsjdfhbjdjbhshbj-->


  <div id="sent" class="tab-pane">

    <div class="container">
      <br>
      <p>Search for residence or room number</p>  
      <input class="form-control" id="myInput" type="text" placeholder="Search..">
      <br>
      
      <table class="table table-bordered table-striped">
        <thead>

          <tr>
            <th>Residence</th>
            <th>Room No.</th>
            <th>Students</th>
            <th>Occupied</th>
          </tr>
        </thead>


        <tbody id="myTable"class="text-dark">
          <tr>
          
            <td>South</td>
            <td>201</td>
            <td>abc 190042112
              <p></p>xyz 190042104
              <p></p>abd 190046291
              <p></p>abp 190046291
            </td>
            <td class="text-info"><b>Yes</b></td>

          
          </tr>

        
        </tbody>
      </table>
      
    
    </div>
        
    


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


    $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

function approval(){
  alert("Request Approved");

  /*
   var btn= document.getElementById("post");
   
  btn.addEventListener("click", ()=>{
    if(btn.innerText === "Approve"){
      btn.innerText= "Approvedddd"
    }
  }
  

  );
  */

  document.getElementById("post").innerHtml= "Approved";
}
    
	</script>
    
    
    
    
    
  </body>
</html>