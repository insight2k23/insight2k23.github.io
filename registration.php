<?php


$total = 0;

$reg = $_POST;

function valid($val, $fail = false, $add = false, $amount = 0){
	
	global $reg,$total;
	
	if(isset($reg[$val])){
		
		$value = htmlspecialchars(htmlentities($reg[$val]));
		
		if($add){
			
			$total += (int) $amount;
			
		}
		
		return $value;
		
	}
	
	if($fail == true){
		
		fail('WRONG_VAR : ' . $val);
		
	}else{
		
		return 0;
		
	}
	
}

function fail($msg = false){
	
	echo $msg ? $msg : "FAIL_";
	die();
	
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kali";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {
	
    fail($conn->connect_error);
	//die("Connection failed: " . $conn->connect_error);
	
} 

$name = valid('name', true);
$college = valid('college',true);
$ccsit = valid('ccsit');
$email = valid('email', true);
$phone = valid('phone', true);
$technova = valid('technova',false,true,200);
$web_design = valid('web_design',false,true,100);
$gaming = valid('gaming',false,true,100);
$seminar = valid('seminar');
$workshop = valid('workshop',false,true,250);
$it_quiz = valid('it_quiz',false,true,100);
$treasure_hunt = valid('treasure_hunt',false,true,100);
$open_forum=valid('open_forum');
$spot_photography = valid('spot_photography',false,true,50);
$paper_presentation = valid('paper_presentation',false,true,150);
$accommodation = valid('accommodation',false,true,40);
$veg = valid('veg');
//$day_1_bf = valid('day_1_bf',false,true,50);
$day_1_lunch = valid('day_1_lunch',false,true,50);
$day_1_dinner = valid('day_1_dinner',false,true,35);
$day_2_bf = valid('day_2_bf',false,true,40);
$day_2_lunch = valid('day_2_lunch',false,true,65);
$day_2_dinner = valid('day_2_dinner',false,true,50);
$total_amount = $total;

$sql = "INSERT INTO `_registration`(
	
	`name`,
	`college`,
	`ccsit`,
	`email`,
	`phone`,
	`technova`,
	`web_design`,
	`gaming`,
	`seminar`,
	`workshop`,
	`it_quiz`,
	`treasure_hunt`,
	`open_forum`,
	`spot_photography`,
	`paper_presentation`,
	`accommodation`,
	`veg`,
	`day_1_lunch`,
	`day_1_dinner`,
	`day_2_bf`,
	`day_2_lunch`,
	`day_2_dinner`,
	`total_amount`
	) VALUES (
		
		'$name',
		'$college',
		$ccsit,
		'$email',
		'$phone',
		$technova,
		$web_design,
		$gaming,
		$seminar,
		$workshop,
		$it_quiz,
		$treasure_hunt,
		$open_forum,
		$spot_photography,
		$paper_presentation,
		$accommodation,
		$veg,
		$day_1_lunch,
		$day_1_dinner,
		$day_2_bf,
		$day_2_lunch,
		$day_2_dinner,
		$total_amount
	)";

if ($conn->query($sql) === TRUE) {
	
   echo "DONE";
   //<a href="index.html">Click Here!</a>
   header("location:index.html?alert=1&msg_cnt=Record Inserted&bg=success");

  // echo '<script type="text/javascript"> window.location = "index.html" </script>';

	
} else {
	
    fail($conn->error);
	
}

$conn->close();

?>