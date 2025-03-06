<!-- Name: Yaqoub Waddad
 	 ID: 1945975
 	 Email: ymohamedwedad@stu.kau.edu.sa
 	-->
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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Meetings Page</title>
	<link rel="stylesheet" type="text/css" href="../CSS/site.css" />
	<link rel="stylesheet" type="text/css" href="../CSS/print.css" />
</head>

<body>
	<!-- nav bar for all pages -->
	<div class='nav no-print'>
		<?php include '../includes/header.php'; ?>
	</div>
	<!-- meetings page content -->
	<h1>Meetings</h1>
	<div class='contianer'>
		<table id='meetingTable' border="5">
			<tr>
				<th colspan='2'>This Week </th>
				<th class='sec'>Meetings</th>
			</tr>
			<tr>
				<th colspan='2'> <span class="date">2024/2/18</span></th>
				<td class='sec' id="cell1" onclick="goToForm('cell1')">
					<?php
					$sql_queryMeeting = "SELECT * FROM meetings WHERE datem = CURDATE() LIMIT 1";
					$result = $conn->query($sql_queryMeeting);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo "<div style='background-color: purple; color:white'> Meeting Title: " . $row["title_id"] .  "</div>";
						}
					} else {
						echo "click to schedule a meeting";
					}
					?>
				</td>
			</tr>
			<tr>
				<th colspan='2'> <span class="date">2024/2/19</span></th>
				<td class='sec' id="cell2" onclick="goToForm('cell2')">
					<?php
					$sql_queryMeeting = "SELECT * FROM meetings WHERE datem = DATE_ADD(CURDATE(), INTERVAL 1 DAY) LIMIT 1";
					$result = $conn->query($sql_queryMeeting);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo "<div style='background-color: purple; color:white'> Meeting Title: " . $row["title_id"] .  "</div>";
						}
					} else {
						echo "click to schedule a meeting";
					}
					?>
				</td>
			</tr>
			<tr>
				<th colspan='2'> <span class="date">2024/2/20</span></th>
				<td class='sec' id="cell3" onclick="goToForm('cell3')">
					<?php
					$sql_queryMeeting = "SELECT * FROM meetings WHERE datem = DATE_ADD(CURDATE(), INTERVAL 2 DAY) LIMIT 1";
					$result = $conn->query($sql_queryMeeting);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo "<div style='background-color: purple; color:white'> Meeting Title: " . $row["title_id"] .  "</div>";
						}
					} else {
						echo "click to schedule a meeting";
					}
					?>
				</td>
			<tr>
				<th colspan='2'> <span class="date">2024/2/21</span></th>
				<td class='sec' id="cell4" onclick="goToForm('cell4')">
					<?php
					$sql_queryMeeting = "SELECT * FROM meetings WHERE datem = DATE_ADD(CURDATE(), INTERVAL 3 DAY) LIMIT 1";
					$result = $conn->query($sql_queryMeeting);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo "<div style='background-color: purple; color:white'> Meeting Title: " . $row["title_id"] .  "</div>";
						}
					} else {
						echo "click to schedule a meeting";
					}
					?>
				</td>
			</tr>
			<tr>
				<th colspan='2'> <span class="date">2024/2/22</span></th>
				<td class='sec' id="cell5" onclick="goToForm('cell5')">
					<?php
					$sql_queryMeeting = "SELECT * FROM meetings WHERE datem = DATE_ADD(CURDATE(), INTERVAL 4 DAY) LIMIT 1";
					$result = $conn->query($sql_queryMeeting);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo "<div style='background-color: purple; color:white'> Meeting Title: " . $row["title_id"] .  "</div>";
						}
					} else {
						echo "click to schedule a meeting";
					}
					?>
				</td>
			</tr>
			<tr>
				<th colspan='2'> <span class="date">2024/2/23</span></th>
				<td class='sec' id="cell6" onclick="goToForm('cell6')">
					<?php
					$sql_queryMeeting = "SELECT * FROM meetings WHERE datem = DATE_ADD(CURDATE(), INTERVAL 5 DAY) LIMIT 1";
					$result = $conn->query($sql_queryMeeting);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo "<div style='background-color: purple; color:white'> Meeting Title: " . $row["title_id"] .  "</div>";
						}
					} else {
						echo "click to schedule a meeting";
					}
					?>
				</td>
			</tr>
			<tr>
				<th colspan='2'> <span class="date">2024/2/24</span></th>
				<td class='sec' id="cell7" onclick="goToForm('cell7')">
					<?php
					$sql_queryMeeting = "SELECT * FROM meetings WHERE datem = DATE_ADD(CURDATE(), INTERVAL 6 DAY) LIMIT 1";
					$result = $conn->query($sql_queryMeeting);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo "<div style='background-color: purple; color:white'> Meeting Title: " . $row["title_id"] .  "</div>";
						}
					} else {
						echo "click to schedule a meeting";
					}
					?>
				</td>
			</tr>
		</table>
	</div>
	<script type="text/javascript">
		//put dynamic date for each row
		let dates = document.getElementsByClassName('date')
		const today = new Date();
		const yyyy = today.getFullYear();
		let mm = today.getMonth() + 1; // Months start at 0!
		if (mm < 10) mm = '0' + mm;
		for (let i = 0; i < dates.length; i++) {
			let dd = today.getDate() + i;
			if (dd < 10) dd = '0' + dd;
			const formattedToday = yyyy + '/' + mm + '/' + dd;
			dates[i].textContent = formattedToday
		}
		// stores the cell that has been clicked
		function goToForm(cellId) {
			sessionStorage.setItem('cellId', cellId);
			let td = document.getElementById(cellId); 
			// choose which page to redirect to
			let containsDiv = td.querySelector('div') !== null;
			if (containsDiv) {
				window.location.href = 'showMeeting.php?cell='+ encodeURIComponent(cellId[4]);
			} else {
				window.location.href = 'create.php';
			}
		}

		window.onload = function() {
			const cellId = sessionStorage.getItem('cellId');

			if (cellId) {
				sessionStorage.removeItem('cellId');
			}
		};
	</script>
	<?php  $conn->close(); ?>
	<!-- footer for all pages -->
	<div class='footer no-print'>
		<?php include '../includes/footer.php'; ?>
	</div>
</body>
</body>

</html>