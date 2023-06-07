<?php

// $encrypted_password = password_hash("cindy@1", PASSWORD_DEFAULT);
// echo $encrypted_password;

// //verifying user 
// if (password_verify('cindy@1', $encrypted_password)) {
//      echo ' Password is valid!';
//  } else {
//      echo ' Invalid password.';
//  }

// Establish a connection to the MySQL database
$servername = "10.5.0.235:3306";
$username = "app";
$password = "1234Uganda*";
$dbname = "nomadapp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the hashed password from the database based on the entered username or email
$userIdentifier = $_POST['biz_username']; // Assuming the user provides the username or email in a form field
$query = "SELECT password FROM users WHERE username = ? OR email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $userIdentifier, $userIdentifier);
$stmt->execute();
$stmt->bind_result($hashedPassword);
$stmt->fetch();
$stmt->close();

// Verify the entered password against the hashed password
$userEnteredPassword = $_POST['password']; // Assuming the user provides the password in a form field

if (password_verify($userEnteredPassword, $hashedPassword)) {
    // Password is correct, perform login actions here
    echo "Login successful!";
} else {
    // Password is incorrect
    echo "Login failed!";
}
// Close the database connection
$conn->close();

?>