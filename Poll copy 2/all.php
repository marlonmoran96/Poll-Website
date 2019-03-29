<!DOCTYPE html>
<html>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    
    

<html>
	<head>
        
		<title>Poll</title>
        
     <h1 class="text-center">Select a Poll to vote on</h1>
	</head>
    <body>
		<div class="container">
            
    <?php
			// connects to databse 
			
					
					$hostname = "localhost";
					$dbUsername = "root";
					$dbPassword = "";
					$db = "PollDB";
		
					$dbconnect = mysqli_connect($hostname, $dbUsername, $dbPassword, $db);
		
					if($dbconnect->connect_error){
						die("Database connection failed: " . $dbconnect->connect_error);
						echo "The Database Failed to Connect";
					}  
			// selects every Poll in my Database 
			
            $query = "Select * FROM Polls";
				$result = mysqli_query($dbconnect, $query) or trigger_error(mysqli_error($dbconnect) . " in " . $query);
            
            // echos out every Poll in my Database 
			// in a table 
			
            echo "<table border='5' align='center'>
							<tr>
							<td>Available Polls</td>
							
						  </tr>";
			// funs a while loop to contunie printing out my questions 
            while($row = mysqli_fetch_array($result)){
						$Q = $row['Question'];
						$NumOfAns = $row['NumOfAns'];
            
           // on click of item, user will be redirected to the voting page, with clicked item
            echo
				
								"<tr>
                                    <td><a href='./vote.php?Question=$Q'>$Q<a/></td>
                                </tr>";
            }
            
    				?>
			
		</div>	
		<br>
		
			<div class="text-center">		
				<button  type="button" class="btn btn-success btn-lg"  onclick="relocate()" >Add another to Poll</button>
               
        
        		</div>
			
           </body>
	 <script>

    
function relocate() {
	// redirects user, if they want to add another poll
    location.replace("./add.php")
}    
</script>  
	
	
    </html>