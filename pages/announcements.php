<!-- Name: Yaqoub Waddad
 	 ID: 1945975
 	 Email: ymohamedwedad@stu.kau.edu.sa
 	-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Announcements</title>
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
$sql_queryMeeting = "SELECT * FROM announcements ORDER BY announce_id DESC LIMIT 30";
$result = $conn->query($sql_queryMeeting);

?>

<body>
	<!-- nav bar for all pages -->
	<div class='nav'>
		<?php include '../includes/header.php'; ?>
	</div>
	<!-- contents of announcement page -->
	<h1>Announcements</h1>
	<blockquote id='announceQoute'><b><i>&quot;If you want to go fast, go alone. If you want to go far, go together&quot;</i></b></blockquote>
	<form action="announceForm.php" method="post" id='announceForm'>
		<legend>Create Announcement</legend>
		<fieldset>
			<label>
				Your Email:<span>*</span>
				<input type="text" name="emailA" id="emailA" maxlength="100" required='required' placeholder="write a proper email" />
			</label>
			<label>
				Username:
				<input type="text" name="username" id="username" maxlength="50" />
			</label>
			<label>
				Announcement:
				<input type="text" name="announcem" id="announcem" />
			</label>
			<label>
				<input type="submit" name="Submit" id="Submit" value="Create Announcement" />
			</label>
		</fieldset>
	</form>
	<div class="container">
		<div id='createA' onclick="document.getElementById('announceForm').style.display='block'">
			<img src="../image/newA.jpg" alt="new announcement-img" width='100%' height='100%' />
		</div>
		<div id="displayA">
			<?php
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "<p> Announcement ID: " . $row['announce_id'] ."</p>";
					echo "<p> Description: ".$row['describ_a']."<hr /> </p>";
					
				}
			} else {
				echo "There are no meetings in the database";
				exit("There are no meetings in the database");
			}
			?>
			display announcements
		</div>
	</div>
	<?php  $conn->close(); ?>
	<!-- footer for all pages -->
	<div class='footer'>
		<?php include '../includes/footer.php'; ?>
	</div>
</body>

</html>