<!-- Name: Yaqoub Waddad
 	 ID: 1945975
 	 Email: ymohamedwedad@stu.kau.edu.sa
 	-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>History Page</title>
	<link rel="stylesheet" type="text/css" href="../CSS/site.css" />
</head>
<?php 
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
	$sql_queryMeeting = "SELECT * FROM meetings ORDER BY datem DESC LIMIT 30";
	$result = $conn->query($sql_queryMeeting);
	
?>
<body>
	<!-- nav bar for all pages -->
	<div class='nav'>
		<?php include '../includes/header.php'; ?>
	</div>
	<!-- contents of History page -->
	<h1>History Of Meetings</h1>
	<div class="container">
		<ol class='list' id='historyList'>
			<?php 
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo "<li> Meeting: ".$row['title_id']." , &nbsp;&nbsp;&nbsp; Date: ".$row['datem']." </li>";
					}
				} else {
					echo "There are no meetings in the database";
					exit("There are no meetings in the database");
				}
			?>
		</ol>
	</div>
	<?php  $conn->close(); ?>
	<!-- footer for all pages -->
	<div class='footer'>
		<?php include '../includes/footer.php'; ?>
	</div>
</body>
</body>
</html>