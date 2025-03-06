<?php
$emailErr = "";
$email = "";
// CHECK IF form is submitted
if( $_SERVER["REQUEST_METHOD"] == "POST" ){
    $valid = true;
    // Validate email
    if (empty($_POST["emailA"])) {
        $emailErr = "Server: Email is required";
        $valid = false;
    } else {
        $email = get_input($_POST["emailA"]);
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Server: Invalid email format";
            $valid = false;
        }
    }
    //
    $name = get_input($_POST["username"]);
    $announce = get_input($_POST["announcem"]);
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
        $announce = mysqli_real_escape_string($conn, $announce);
    
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
        // Announcement Table
        // Insert new announcement
        $insert_sql_meet = "INSERT INTO announcements (describ_a,f_email_id) VALUES ('$announce','$email')";
        if ($conn->query($insert_sql_meet) === TRUE) {
            echo "New announcement created successfully with discription: $announce<br />";
        } else {
            echo "Error: " . $insert_sql_meet . "<br>" . $conn->error;
            exit("cannot insert new announcement");
        }

        //close connection
        $conn->close();
        header("Location: announcements.php");
    } else { //invalid FORM
        echo "Server: some Form data is invalid.";
        echo "<br />Email Error: $emailErr";
        include "announcements.php";
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