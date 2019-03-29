<!DOCTYPE html>
<html>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    
    

<html>
	<head>
        
		<title>Poll</title>
        <h1 class="text-center">Welcome to the Poll Site , Where Disputes are Settled!</h1>

		
        
</head>

    <body>
        <?php
			// ensures connection to databse, before anything is done on the website. 
				if(isset($_POST['submit'])){
					
					$hostname = "localhost";
					$dbUsername = "root";
					$dbPassword = "";
					$db = "PollDB";
		
					$dbconnect = mysqli_connect($hostname, $dbUsername, $dbPassword, $db);
		
					if($dbconnect->connect_error){
						die("Database connection failed: " . $dbconnect->connect_error);
						echo "The Database Failed to Connect";
					}
    }

?> 
		<br>
<div class='wrapper text-center'>
	
	
		<button type="button" class="btn btn-success btn-lg"onclick="relocate2()">Create a Poll</button>
               
        
        <button type="button" class="btn btn-info btn-lg"onclick="relocate1()">View All Current Polls</button>
     <br>
	<br>
<img src="poll.jpg" class="img-circle" alt="Cinque Terre">    
	</div>
    </body>
        
<script>
	// used to relocate user to differne pages 
function relocate1() {
    location.replace("./all.php")
}
    // used to relocate user to differne pages 
function relocate2() {
    location.replace("./add.php")
}    
</script>

</html>
