<?php
include "conn.php";
// Check connection
try{
    //capture data from front end of the app
    // $received_name = $_REQUEST['name'];
    // $received_username = $_REQUEST['username'];
    // $received_password = $_REQUEST['pass'];
    // $received_email = $_REQUEST['email'];

    $received_name = "hilla";
    $received_username = "hilla";
    $received_password = "1234";
    $received_email = "hkaluuma@idi.co.ug";

    $sql = "INSERT INTO users (name, email, username, password)
    VALUES ('$received_name ','$received_email','$received_username','$received_password')";

    if ($conn->query($sql) === TRUE) {
        echo "1";
    } else {
        echo "0";
    }
    $conn->close();
}catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
}
?>
