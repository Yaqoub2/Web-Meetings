<?php
$titleErr = $emailErr = $dateErr = "";
$email = $title = "";
// CHECK IF form is submitted
if( $_SERVER["REQUEST_METHOD"] == "POST" ){
    $valid = true;
    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Server: Email is required";
        $valid = false;
    } else {
        $email = get_input($_POST["email"]);
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Server: Invalid email format";
            $valid = false;
        }
    }
    // Validate title of the meeting
    if (empty($_POST["meetingTitle"])) {
        $titleErr = "Server: title is required";
        $valid = false;
    } else {
        $title = get_input($_POST["meetingTitle"]);
    }
    // Validate date of the meeting
    if (empty($_POST["aPosition"])) {
        $dateErr = "Server: date is required, please create form from Meetings page";
        $valid = false;
    }
    else{
        $date = get_input($_POST["aPosition"]);
        //handle date
        if(is_numeric($date)){
            $date = intval($date);
            if($date > 0 && $date <8){
                $date -= 1; 
                $date = Date("Y-m-d",strtotime("+$date day"));
            }
            else {
                $dateErr = "date is out of range";
                $valid = false;
            }

        }
        else{
            $dateErr = "date is not numeric";
            $valid = false;
        }
    }
    $name = get_input($_POST["authorName"]);
    $importance = get_input($_POST["myRadio"]);
    $place = get_input($_POST["placeCheckbox"]);
    $presence = get_input($_POST["presCheckbox"]);
    $selecMenu = get_input($_POST["selectMeeting"]);
    $Descrip = get_input($_POST["Description"]);
    $linkm = get_input($_POST["meetingLink"]);
    // *********************insert to Database************************
    if ($valid) {
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
        // Escape user inputs for SQL injection security
        $email = mysqli_real_escape_string($conn, $email);
        $name = mysqli_real_escape_string($conn, $name);
        $title = mysqli_real_escape_string($conn, $title);
        $importance = mysqli_real_escape_string($conn, $importance);
        $place = mysqli_real_escape_string($conn, $place);
        $presence = mysqli_real_escape_string($conn, $presence);
        $selecMenu = mysqli_real_escape_string($conn, $selecMenu);
        $Descrip = mysqli_real_escape_string($conn, $Descrip);
        $linkm = mysqli_real_escape_string($conn, $linkm);
    
        // User Table
        $check_sql_user = "SELECT email_id FROM users WHERE email_id = '$email'";
        $result = $conn->query($check_sql_user);
        if (!$result->num_rows > 0) {
            // Insert new user
            $insert_sql_user = "INSERT INTO users (email_id, uname) VALUES ('$email', '$name')";
            if ($conn->query($insert_sql_user) === TRUE) {
                echo "New User created successfully with email: $email<br />";
            } else {
                echo "Error: " . $insert_sql_user . "<br>" . $conn->error;
                exit("cannot insert new user");
            }
        }
        // Meeting Table
        $check_sql_meet = "SELECT title_id FROM meetings WHERE title_id = '$title'";
        $result = $conn->query($check_sql_meet);
        if (!$result->num_rows > 0) {
            //check date is unique
            $check_sql_date = "SELECT datem FROM meetings WHERE datem = '$date'";
            $result_date = $conn->query($check_sql_date);
            if(!$result_date->num_rows > 0){
            // Insert new meeting
            $insert_sql_meet = "INSERT INTO meetings (title_id,datem,importance,place,presence,catogery,describ,link,f_email_id) VALUES ('$title', '$date','$importance', '$place', '$presence', '$selecMenu','$Descrip','$linkm','$email')";
            if ($conn->query($insert_sql_meet) === TRUE) {
                echo "New Meeting created successfully with title: $title<br />";
            } else {
                echo "Error: " . $insert_sql_meet . "<br>" . $conn->error;
                exit("cannot insert new meeting");
            }
         }
         else{
            echo "Error date: " . $date . " has a meeting<br>";
            exit("cannot insert new meeting with same date");
         }
        }
        //close connection
        $conn->close();
        // echo "Form data is valid.";
        // echo "<br />Email: $email";
        // echo "<br />Title: $title";
        // echo "<br />Day: $date";
        header("Location: meetings.php");
    } else { //invalid FORM
        echo "Server: some Form data is invalid.";
        echo "<br />Email Error: $emailErr";
        echo "<br />Title Error: $titleErr";
        echo "<br />Date Error: $dateErr";
        include "create.php";
    }
}
// user access this page from different path
else {
    header("Location: index.php");
}

// Function to manage user input and XSS scripting
function get_input($data) {
    if(!empty($data)){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    }
    return $data;
}
?>