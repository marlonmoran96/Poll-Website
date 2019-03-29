<!DOCTYPE html>


<html>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<head>
        	<title>Poll</title>
        <h1 class="text-center">Vote</h1>
        </head>
    <br> 
  
       
            <?php
            session_start();
			// connects to database 
            $hostname = "localhost";
					$dbUsername = "root";
					$dbPassword = "";
					$db = "PollDB";
		
					$dbconnect = mysqli_connect($hostname, $dbUsername, $dbPassword, $db);
		
					if($dbconnect->connect_error){
						die("Database connection failed: " . $dbconnect->connect_error);
						echo "The Database Failed to Connect";
					}  
            	// gets all informatio from sent over question, which is the ID
            $Q= $_GET['Question'];
            $query = "Select * FROM Polls WHERE Question ='$Q'";
				$result = mysqli_query($dbconnect, $query) or trigger_error(mysqli_error($dbconnect) . " in " . $query);
            
	       
             
            // gets question from database for voting
            $row = mysqli_fetch_array($result);  
             $NumOfAns = $row['NumOfAns'];  
             $a1 = $row['A1'];  
             $a2 = $row['A2'];  
             $a3 = $row['A3'];  
             $a4= $row['A4'];  
             $a5= $row['A5'];  
             $a6= $row['A6'];  
             $ans = $row['Answers'];  
			// sends key to session, so it can be retrived on the next page. 
           
            $_SESSION['Question'] = $Q;
			
?>
    
        <h2 class="text-center" id="Question" name="Question" > <?php echo $Q ?></h2>
  <body>
 <div  class='wrapper text-center' class="container"  > 
	 
      <form class="form" method="get" action="results.php">   
		  <label><input  type="radio"  name="a"  id="a" value="1"  >	<?php echo $a1 ?></label>
				
             
		  		
             
                <br>
		  
                 <label><input  type="radio" name="a"  class='wrapper text-center' id="a" value="2"   >	<?php echo $a2 ?></label>
                <br>
                
		  
                <div  id="op2" class="invisible" >
                 <label><input type="radio" name="a"  class='wrapper text-center' id="a" value="3"   >	<?php echo $a3 ?></label>
                </div> 
                
                <div  id="op3" class="invisible" >    
                 <label><input type="radio"  name="a" class='wrapper text-center' id="a" value="4"  >	<?php echo $a4 ?></label>
                </div> 
                
                <div  id="op4" class="invisible" >    
                 <label><input type="radio"  name="a" id="a" value="5"  >	<?php echo $a5 ?></label>
                </div>  
              
                <div  id="op5" class="invisible" >    
                 <label><input type="radio"  name="a"  id="a" value="6"  >	<?php echo $a6 ?></label>
                
                </div  >
		   <button  id="submit" type="submit" class="btn btn-secondary"  >Vote </button>
		  
           </form>
	 
        </div>
		
		
               
          
  <script> 
	  // used to make option invisble, depdeing on how many answers the displayed question has 
      var x =  "<?php echo $NumOfAns ?>";
	  
        if(x==3){
            $('#op2').removeClass("invisible");
        }else if(x==4){
            $('#op2').removeClass("invisible");
            $('#op3').removeClass("invisible");
        }else if(x==5){
            $('#op2').removeClass("invisible");
            $('#op3').removeClass("invisible");
            $('#op4').removeClass("invisible");
        }else if(x==6){
            $('#op2').removeClass("invisible");
            $('#op3').removeClass("invisible");
            $('#op4').removeClass("invisible");
            $('#op5').removeClass("invisible");
        
        }
            
       
    </script>  

	 
             </body>
        
        
    </html>            