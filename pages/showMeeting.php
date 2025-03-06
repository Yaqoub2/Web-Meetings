<!-- Name: Yaqoub Waddad
 	 ID: 1945975
 	 Email: ymohamedwedad@stu.kau.edu.sa
 	-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Meeting Details</title>
	<link rel="stylesheet" type="text/css" href="../CSS/site.css" />
</head>

<body>
	<!-- nav bar for all pages -->
	<div class='nav'>
		<?php include '../includes/header.php'; ?>
	</div>
	<!-- contents of Meeting Details page -->
	<h1>Meeting Details</h1>
	<?php
	if (isset($_GET['cell'])) {
		$date_show = $_GET['cell'];
		if(is_numeric($date_show) && $date_show >0 && $date_show <8){
			$date_fetch = intval($date_show);
			$date_fetch -= 1; 
            $date_fetch = Date("Y-m-d",strtotime("+$date_fetch day"));
			//fetch meeting
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "meeting_database";
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			//meeting details
			$sql_queryMeeting = "SELECT * FROM meetings WHERE datem = '$date_fetch' LIMIT 1";
			$result = $conn->query($sql_queryMeeting);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$info  = $row;
				}
			}
			else{
				echo "There is no meeting in this day";
			}
		} 
		else{
			echo "Error: date format is wrong, or out of range";
			exit("Error: date format is wrong, or out of range");
		}
	} else {
		echo "Error: date not provided.";
		exit("Error: date not provided.");
	}
	?>
	<div class="container">
		<div class='md'>Meeting Title: 
			<?php echo $info['title_id'] ?>
		</div>
		<div class='md'>Meeting Date: 
			<?php echo $info['datem'] ?>
		</div>
		<div class='md'>Meeting Author Email: 
			<?php echo $info['f_email_id'] ?>
		</div>
		<div class='md'>
			Meeting Importance: <?php echo $info['importance']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ?>
			Meeting Place: <?php echo $info['place']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ?>
			Meeting Type: <?php echo $info['catogery']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ?>
			Meeting Presence: <?php echo $info['presence'] ?>
		</div>
		<div class='md'>Meeting Description: 
			<?php echo $info['describ'] ?>
		</div>
		<div class='md'>Meeting Link: 
			<?php echo $info['link'] ?>
		</div>
	</div>
	<!-- footer for all pages -->
	<div class='footer'>
		<?php include '../includes/footer.php'; ?>
	</div>
</body>

</html>