	<?php
	  session_start();
	// gets Session key for question. 
	// gets ID, for selected responce. 
	$Q = $_SESSION['Question']; 
	$sANS = $_GET['a'];
	
				$hostname = "localhost";
					$dbUsername = "root";
					$dbPassword = "";
					$db = "PollDB";
		
					$dbconnect = mysqli_connect($hostname, $dbUsername, $dbPassword, $db);
		
					if($dbconnect->connect_error){
						die("Database connection failed: " . $dbconnect->connect_error);
						echo "The Database Failed to Connect";
					}  
            // retrives info for this certain question. 
         
            $query = "Select * FROM Polls WHERE Question ='$Q'";
				$result = mysqli_query($dbconnect, $query) or trigger_error(mysqli_error($dbconnect) . " in " . $query);
	
            $row = mysqli_fetch_array($result);  
             $NumOfAns = $row['NumOfAns'];  
             $a1 = $row['A1'];  
             $a2 = $row['A2'];  
             $a3 = $row['A3'];  
             $a4= $row['A4'];  
             $a5= $row['A5'];  
             $a6= $row['A6'];  
             $ans = $row['Answers'];  
		// checks ID of submmitted vote, so it can count the vote 
            if($sANS=="1"){
         			// gets answers and seperates them into an array
				$pie = explode(",", $ans);
				//gets index of voted answer
				$num = $pie [0];  
				// adds the vote 
				$int = (int)$num + 1; 
				// converts it back into a string
				$result = (string)$int; 
				$pie [0] =$result;
				$com = implode(",", $pie);
				$ans=$com;
				// then updates the string in the database. 
				$query = "UPDATE Polls SET Answers=('$ans') Where Question =('$Q')";
				if(mysqli_query($dbconnect, $query)){
							
						}
						else{
							trigger_error(mysqli_error($dbconnect) . " in " . $query);
						}
					// checks ID of submmitted vote, so it can count the vote 
				// does same thing as the first if statement, only for the second option of the question 
			}else if($sANS=="2" ){
         			
				$pie = explode(",", $ans);
				// gets second index instead, but same process 
				$num = $pie [1];  
				$int = (int)$num + 1; 
				// converts it back into a string
				$result = (string)$int; 
				$pie [1] =$result;
				$com = implode(",", $pie);
				$ans=$com;
				//Updates the string in the database.
				$query = "UPDATE Polls SET Answers=('$ans') Where Question =('$Q')";
				if(mysqli_query($dbconnect, $query)){
							
						}
						else{
							trigger_error(mysqli_error($dbconnect) . " in " . $query);
						}
						
				// checks ID of submmitted vote, so it can count the vote 
				// same method as previous if statements, only for index 2 this time, or if the user slected the third option. 
			}else if($sANS=="3"){
         			
				$pie = explode(",", $ans);
				$num = $pie [2];  
				$int = (int)$num + 1; 
				// converts it back into a string
				$result = (string)$int; 
				$pie [2] =$result;
				$com = implode(",", $pie);
				$ans=$com;
				//Updates the string in the database.
				$query = "UPDATE Polls SET Answers=('$ans') Where Question =('$Q')";
				if(mysqli_query($dbconnect, $query)){
							
						}
						else{
							trigger_error(mysqli_error($dbconnect) . " in " . $query);
						}
						
				// checks ID of submmitted vote, so it can count the vote 
								// same method as previous if statements, only for index 3 this time, or if the user slected the third option. 
			}else if($sANS=="4"){
         			
				$pie = explode(",", $ans);
				$num = $pie [3];  
				$int = (int)$num + 1; 
			
				// converts it back into a string
				$result = (string)$int; 
				$pie [3] =$result;
				$com = implode(",", $pie);
				$ans=$com;
				//Updates the string in the database.
				$query = "UPDATE Polls SET Answers=('$ans') Where Question =('$Q')";
				if(mysqli_query($dbconnect, $query)){
							
						}
						else{
							trigger_error(mysqli_error($dbconnect) . " in " . $query);
						}
						
				// checks ID of submmitted vote, so it can count the vote 
				// same method as previous if statements, only for index 4 this time, or if the user slected the third option. 
			}else if($sANS=="5"){
         			
				$pie = explode(",", $ans);
				$num = $pie [4];  
				$int = (int)$num + 1; 
				
				// converts it back into a string
				$result = (string)$int; 
				$pie [4] =$result;
				$com = implode(",", $pie);
				$ans=$com;
				//Updates the string in the database.
				$query = "UPDATE Polls SET Answers=('$ans') Where Question =('$Q')";
				if(mysqli_query($dbconnect, $query)){
						
						}
						else{
							trigger_error(mysqli_error($dbconnect) . " in " . $query);
						}
						
				// checks ID of submmitted vote, so it can count the vote 
				// same method as previous if statements, only for index 5 this time, or if the user slected the third option. 
			}else if($sANS=="6"){
         			
				$pie = explode(",", $ans);
				$num = $pie [5]; 
				
				$int = (int)$num + 1; 
				// converts it back into a string
				$result = (string)$int; 
				$pie [5] =$result;
				$com = implode(",", $pie);
				$ans=$com;
				//Updates the string in the database.
				$query = "UPDATE Polls SET Answers=('$ans') Where Question =('$Q')";
				if(mysqli_query($dbconnect, $query)){
						
						}
						else{
							trigger_error(mysqli_error($dbconnect) . " in " . $query);
						}
						
				
			}
				// if statments are used to display the correct anmount of bars, for the paticular question. 
			// checks how many answers the quesiton has
			 if($NumOfAns=="2"){
				 // puts answers into array, to get intger value
         		$pie = explode(",", $ans);
				
				// gets integer vavlue 
				$int = (int)$pie[0]; 
				$int2=(int)$pie [1];
				 // holder for divison and converts them to float 
				$holder =(float)$int+(float)$int2; 
				 // gets the float number for divison 
				 $perc1=  ($int/$holder);
				 // times 100, inorder to show whole numbers, not percentages. 
				 $perc1= ($perc1 * 100); 
				 $perc1= (round($perc1,2));
				 $perc2=  ($int2/$holder);
				 $perc2= ($perc2 * 100); 
				 $perc2= (round($perc2,2));
						
			
				// sends data, to dataPoints, so it can be displayed accordingly. 
				 $dataPoints = array(
					array("label"=>"$a1 % $perc1", "y"=> $int),
	
					array("label"=>"$a2 % $perc2", "y"=> $int2));
				 	// same process as the previous if statment, only differnces, is this one has three answers
			}else if($NumOfAns=="3"){
         		$pie = explode(",", $ans);
				 // gets three numbers instead this time 
				$int = (int)$pie[0]; 
				$int2=(int)$pie [1];
				$int3=(int)$pie [2];
				 // adds three numbers this time 
				$holder =(float)$int+(float)$int2 +(float)$int3; 
				 $perc1=  ($int/$holder);
				 $perc1= ($perc1 * 100); 
				 $perc1= (round($perc1,2));
				 $perc2=  ($int2/$holder);
				 $perc2= ($perc2 * 100); 
				 $perc2= (round($perc2,2));
				 $perc3=  ($int3/$holder);
				 $perc3= ($perc3 * 100); 
				 $perc3= (round($perc3,2));
				
			
						
				// shows three rows this time, since it will have three answers, but uses the same process. 
	
				 $dataPoints = array(
					array("label"=>"$a1 % $perc1", "y"=> $int),
	
					array("label"=>"$a2 % $perc2", "y"=> $int2),
				 	array("label"=>"$a3 % $perc3", "y"=> $int3));
				 // same process as the previous if statment, only differnces, is this one has four answers
			}else if($NumOfAns=="4"){
				// gets percentage and vote count  for 4 options this time 
         		$pie = explode(",", $ans);
				$int = (int)$pie[0]; 
				$int2=(int)$pie [1];
				$int3=(int)$pie [2];
				$int4=(int)$pie [3];
				$holder =(float)$int+(float)$int2 +(float)$int3 +(float)$int4 ; 
				
					 
				
				 $perc1=  ($int/$holder);
				 $perc1= ($perc1 * 100); 
				 $perc1= (round($perc1,2));
				 $perc2=  ($int2/$holder);
				 $perc2= ($perc2 * 100); 
				 $perc2= (round($perc2,2));
				 $perc3=  ($int3/$holder);
				 $perc3= ($perc3 * 100); 
				 $perc3= (round($perc3,2));
				 $perc4=  ($int4/$holder);
				 $perc4= ($perc4 * 100); 
				 $perc4= (round($perc4,2));
			
						
				// displays 4 data points, for the 4 answers 
	
				  $dataPoints = array(
					array("label"=>"$a1 % $perc1", "y"=> $int),
	
					array("label"=>"$a2 % $perc2", "y"=> $int2),
				 	array("label"=>"$a3 % $perc3", "y"=> $int3),
					array("label"=>"$a4 % $perc4", "y"=> $int4));
				 // same process as the previous if statment, only differnces, is this one has five answers
			 }else if($NumOfAns=="5"){
				 // gets percentage and vote count  for 5 options this time 
         		$pie = explode(",", $ans);
				$int = (int)$pie[0]; 
				$int2=(int)$pie [1];
				$int3=(int)$pie [2];
				$int4=(int)$pie [3];
				$int5=(int)$pie [4];
				$holder =(float)$int+(float)$int2 +(float)$int3 + (float)$int4 + (float)$int5; 
				 $perc1=  ($int/$holder);
				 $perc1= ($perc1 * 100); 
				 $perc1= (round($perc1,2));
				 $perc2=  ($int2/$holder);
				 $perc2= ($perc2 * 100); 
				 $perc2= (round($perc2,2));
				 $perc3=  ($int3/$holder);
				 $perc3= ($perc3 * 100); 
				 $perc3= (round($perc3,2));
				 $perc4=  ($int4/$holder);
				 $perc4= ($perc4 * 100); 
				 $perc4= (round($perc4,2));
				 $perc5=  ($int5/$holder);
				 $perc5= ($perc5 * 100); 
				 $perc5= (round($perc5,2));
			
						
				// displays data for 5 options this time
				$dataPoints = array(
					array("label"=>"$a1 % $perc1", "y"=> $int),
	
					array("label"=>"$a2 % $perc2", "y"=> $int2),
				 	array("label"=>"$a3 % $perc3", "y"=> $int3),
					array("label"=>"$a4 % $perc4", "y"=> $int4),
					array("label"=>"$a5 % $perc5", "y"=> $int5));
				 // same process as the previous if statment, only differnces, is this one has six answers
			 }else if($NumOfAns=="6"){
				 // gets percentage and votes for 6 options this time 
         		$pie = explode(",", $ans);
				$int = (int)$pie[0]; 
				$int2=(int)$pie [1];
				$int3=(int)$pie [2];
				$int4=(int)$pie [3];
				$int5=(int)$pie [4];
				$int6=(int)$pie [5];
			    $holder =(float)$int+(float)$int2 +(float)$int3 + (float)$int4 + (float)$int5 + (float)$int6;  
				 $perc1=  ($int/$holder);
				 $perc1= ($perc1 * 100); 
				 $perc1= (round($perc1,2));
				 $perc2=  ($int2/$holder);
				 $perc2= ($perc2 * 100); 
				 $perc2= (round($perc2,2));
				 $perc3=  ($int3/$holder);
				 $perc3= ($perc3 * 100); 
				 $perc3= (round($perc3,2));
				 $perc4=  ($int4/$holder);
				 $perc4= ($perc4 * 100); 
				 $perc4= (round($perc4,2));
				 $perc5=  ($int5/$holder);
				 $perc5= ($perc5 * 100); 
				 $perc5= (round($perc5,2));
				 $perc6=  ($int6/$holder);
				 $perc6= ($perc6 * 100); 
				 $perc6= (round($perc6,2));
						
					
				// displays data for 6 options this time
	
				$dataPoints = array(
					array("label"=>"$a1 % $perc1", "y"=> $int),
	
					array("label"=>"$a2 % $perc2", "y"=> $int2),
				 	array("label"=>"$a3 % $perc3", "y"=> $int3),
					array("label"=>"$a4 % $perc4", "y"=> $int4),
					array("label"=>"$a5 % $perc5", "y"=> $int5),
					array("label"=>"$a6 % $perc6", "y"=> $int6));
			 }
			 
	?>
	
<!DOCTYPE html>


<html>
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script
		 src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
	// loads, for 
window.onload = function () {
	// variable for bar chart 
 
var barchart = new CanvasJS.Chart("cContainer", {
	// for animated bars
	animationEnabled: true,
	// for exported data 
	exportEnabled: true,
	theme: "light2", 
	title:{
		text: "Poll Results"
	},
	data: [{
		// style for columns 
		type: "column", 
		indexLabelFontColor: "#000000",
		indexLabelPlacement: "outside",   
			// echos data, for ensures it is numbers 
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
		   // renders te chart 
barchart.render();
 
}


</script>
	<title>Results</title>
<body> 

<div id="cContainer" style="height: 300px; width: 100%;"></div>
<div class='wrapper text-center'>		
		<button type="button" class="btn btn-primary btn-lg btn-block"onclick="relocate()">Back to All Polls</button>	
	</div>
</body>
      <script>

    
function relocate() {
	// relocates user to all polls poage 
    location.replace("./all.php")
}    
</script>  
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>       
    </html>            