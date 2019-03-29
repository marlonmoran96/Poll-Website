<!DOCTYPE html>
<html>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    
    <script>
		// makes certain inputs invisible, based on number of answers the poll has 
      $(document).ready(function () {
    $('#ans').change(function (){
    if($('#ans').val()=='1'){
        $('#a1').show();
        $('#a2').hide();
        $('#a3').hide();
        $('#a4').hide();
        $('#a5').hide();
        $('#a6').hide();
        
    } else if($('#ans').val()=='2'){
        $('#a1').show();
        $('#a2').show();
        $('#a3').hide();
        $('#a4').hide();
        $('#a5').hide();
        $('#a6').hide();
        
    }else if($('#ans').val()=='3'){
        $('#a1').show();
        $('#a2').show();
        $('#a3').show();
        $('#a4').hide();
        $('#a5').hide();
        $('#a6').hide();
       
    }else if($('#ans').val()=='4'){
        $('#a1').show();
        $('#a2').show();
        $('#a3').show();
        $('#a4').show();
        $('#a5').hide();
        $('#a6').hide();
       
    }else if($('#ans').val()=='5'){
        $('#a1').show();
        $('#a2').show();
        $('#a3').show();
        $('#a4').show();
        $('#a5').show();
        $('#a6').hide();
       
    }else if($('#ans').val()=='6'){
        $('#a1').show();
        $('#a2').show();
        $('#a3').show();
        $('#a4').show();
        $('#a5').show();
        $('#a6').show();
    }
    });
});
   </script>
<script>
function myFunction() {
	// redirects user to another page 
    location.replace("./all.php")
}
    </script>
 
<html>
	<head>
        
     
        
		<title>Poll</title>
        <h1 class="text-center">Add a Poll</h1>
        </head>
    
<body>
      	<div class="container">
              
 <form class="form" method="post"  > 
        <div class="panel-heading">What's your question? 
            <input type="text" class="form-control" id="Qs" name="Qs">
    

    

            <label for="an">Select Number of responces to your question </label>
            <select  class="form-control" class = "opt" id="ans">
        
            <option value="1" id="ans" >1</option>
            <option value="2" id="ans">2</option>
            <option value="3" id="ans">3</option>
            <option value="4" id="ans">4</option>
                <option value="5" id="ans">5</option>
            <option value="6" id="ans">6</option>
            </select>
  
     
        
            <label for="answersLabel">Enter Answers Below</label>
            <div >

                <input type='text' id="a1" name="a1" />
                <input type='text' id="a2" name="a2"  />
                <input type='text' id="a3"  name="a3" />
                <input type='text' id="a4" name="a4" >
                <input type='text' id="a5" name="a5"/>
                <input type='text' id="a6" name="a6" />
            </div>
      
    <br>
    <button type="submit" class="btn btn-success" value="Insert"  name="submit" >Submit Poll</button>
            
    
        <button type="button" class="btn btn-secondary" onclick="myFunction()">See Polls</button>        
      
</form>		
			<?php
				session_start();
	 // gets submit from the form 
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
					// references the inputs and selections on page  
                    $Qs = $_POST['Qs'];
                    $a1 = $_POST['a1'];
                    $a2 = $_POST['a2'];
                    $a3 = $_POST['a3'];
                    $a4 = $_POST['a4'];
                    $a5 = $_POST['a5'];
                    $a6 = $_POST['a6'];
                    $x1 = "0";
                    $x2 = "0,0";
                    $x3 = "0,0,0";
                    $x4 = "0,0,0,0";
                    $x5 = "0,0,0,0,0";
                    $x6 = "0,0,0,0,0,0";
                    $Num1 = 1;
                    $Num2= 2;
                    $Num3 = 3;
                    $Num4 = 4;
                    $Num5 = 5;
                    $Num6 = 6;
                    if(
						// ensures something is at least entered 
						strlen($Qs) < 1 &&
						strlen($a1) < 1 &&
						strlen($a2) < 1 &&
                        strlen($a3) < 1 &&
                        strlen($a4) < 1 &&
                        strlen($a5) < 1 &&
                        strlen($a6) < 1 )
						{
						echo "Please enter your poll information";
                    }else if(
						// will insert single poll, wiht one answer 
                        strlen($a2) < 1 &&
                        strlen($a3) < 1 &&
                        strlen($a4) < 1 &&
                        strlen($a5) < 1 &&
                        strlen($a6) < 1 ) {
                        // inserts options 
                        $query = "INSERT INTO Polls (Question, NumOfAns, A1, Answers) VALUES ('$Qs', '$Num1', '$a1', '$x1')";
						
						if(mysqli_query($dbconnect, $query)){
							echo "Successfully Added";
						}
						else{
							trigger_error(mysqli_error($dbconnect) . " in " . $query);
						}
                        	// inserts two answers and the question, if two answers are enetred. 
                        }else if(
                    
                        strlen($a3) < 1 &&
                        strlen($a4) < 1 &&
                        strlen($a5) < 1 &&
                        strlen($a6) < 1 ) {
                        
                        $query = "INSERT INTO Polls (Question, NumOfAns, A1, A2, Answers) VALUES ('$Qs', '$Num2', '$a1', '$a2', '$x2')";
                        
						if(mysqli_query($dbconnect, $query)){
							echo "Successfully Added";
						}
						else{
							trigger_error(mysqli_error($dbconnect) . " in " . $query);
						}
                        // inserts three answers and the question, if three answers are enetred. 
                        }else if(
                       
                        strlen($a4) < 1 &&
                        strlen($a5) < 1 &&
                        strlen($a6) < 1 ) {
                        $query = "INSERT INTO Polls (Question, NumOfAns, A1, A2, A3,  Answers) VALUES ('$Qs', '$Num3', '$a1', '$a2','$a3', '$x3')";
                        
						if(mysqli_query($dbconnect, $query)){
							echo "Successfully Added";
						}
						else{
							trigger_error(mysqli_error($dbconnect) . " in " . $query);
						}
                        // inserts four answers and the question, if four answers are enetred. 
                        }else if(
                       
                        strlen($a5) < 1 &&
                        strlen($a6) < 1 ) {
                        $query = "INSERT INTO Polls (Question, NumOfAns, A1, A2, A3, A4 ,  Answers) VALUES ('$Qs', '$Num4', '$a1', '$a2','$a3','$a4', '$x4')";
                        
						if(mysqli_query($dbconnect, $query)){
							echo "Successfully Added";
						}
						else{
							trigger_error(mysqli_error($dbconnect) . " in " . $query);
						}
                        // inserts five answers and the question, if five answers are enetred. 
                        }else if(
                       
                        strlen($a6) < 1 ) {
                              $query = "INSERT INTO Polls (Question, NumOfAns, A1, A2, A3, A4 , A5 ,  Answers) VALUES ('$Qs', '$Num5', '$a1', '$a2','$a3','$a4', '$a5',  '$x5')";
                        
						if(mysqli_query($dbconnect, $query)){
							echo "Successfully Added";
						}
						else{
							trigger_error(mysqli_error($dbconnect) . " in " . $query);
						}
                        	// inserts everything, since 6 answers were typed out 
                        }else {
                            $query = "INSERT INTO Polls (Question, NumOfAns, A1, A2, A3, A4 , A5 , A6,  Answers) VALUES ('$Qs', '$Num6', '$a1', '$a2','$a3','$a4', '$a5', '$a6', '$x6')";
                        
						if(mysqli_query($dbconnect, $query)){
							echo "Successfully Added";
						}
						else{
							trigger_error(mysqli_error($dbconnect) . " in " . $query);
						}
                        
                       
                         }
                    
    }
    

?>
    

	</div>        

        
          </body>
        
    </html>