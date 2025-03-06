<!-- Name: Yaqoub Waddad
 	 ID: 1945975
 	 Email: ymohamedwedad@stu.kau.edu.sa
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Sechedule Meeting</title>
	<link rel="stylesheet" type="text/css" href="../CSS/site.css" />
	<script type="text/javascript" src="../javascript/validation.js"></script>
	<script type="text/javascript">
		window.onload = function() {
            const cellId = sessionStorage.getItem('cellId');
            document.getElementById('aPosition').value = cellId[4]; //last char = number
        };

        
	</script>
</head>

<body>
	<!-- nav bar for all pages -->
	<div class='nav'>
		<?php include '../includes/header.php'; ?>
	</div>
	<!-- Sechedule Meeting page content -->
	<h1>Sechudule Meeting</h1>
	<div class="container">
		<form action="primaryForm.php" id="meetingForm" name="meetingForm" method="post" onsubmit="return validateForm(event)" >
			<input type="hidden" name="aPosition" id="aPosition" />
			<fieldset name="authorSet" id="authorSet">
				<legend>Author Details</legend>
				<label>
					Email:<span>*</span>
					<input type="text" name="email" id="email" maxlength="100" required='required' placeholder="write a proper email" />
				</label>
				<label>
					Author Name:
					<input type="text" name="authorName" id="authorName" maxlength="50" />
				</label>
			</fieldset>
			<fieldset name="meetingSet" id="meetingSet">
				<legend>Meeting Details</legend>
				<label>
					Title:<span>*</span>
					<input type="text" name="meetingTitle" id="meetingTitle" required='required' placeholder="enter the title of your meeting" />
				</label>
				<label class='inline'>
					Importance:
					<input type="radio" name="myRadio" id="radio1" value='high' checked='checked' /> High
					<input type="radio" name="myRadio" id="radio2" value='low' /> Low
				</label>
				<label class='inline'>
					Meeting Place:
					<input type="checkbox" name="placeCheckbox" id="placeCheckbox" value='online' checked='checked' /> online
				</label>
				<label class='inline'>
					Presence:
					<input type="checkbox" name="presCheckbox" id="presCheckbox" value='mandatory' checked='checked' /> mandatory
				</label>
				<label class='inline'>
					Meeting Catogery:
					<select name="selectMeeting" id="selectMeeting" > 
						<option value="study">Study</option>
						<option value="work">Work</option>
						<option value="play">Play</option>
						<option value="other">Other</option>
					</select>
				</label>
				<label>
					Description:
					<input type="text" name="Description" id="Description" />
				</label>
				<label>
					Link:
					<input type="text" name="meetingLink" id="meetingLink" />
				</label>
			</fieldset>
			<fieldset >
			<label>
				Feedback:
				<textarea name="taMeeting" id="taMeeting" rows="2" cols="170" readonly='readonly'></textarea>
			</label>
			<label class="inline">
				<input type="reset" name="reset" id="reset" />
			</label>
			<label class="inline">
				<input type="submit" name="Submit" id="Submit" value="Create Meeting" />
			</label>
			</fieldset>
		</form>
	</div>
	<!-- footer for all pages -->
	<div class='footer'>
		<?php include '../includes/footer.php'; ?>
	</div>
</body>

</html>