
<?php
// Check connection
include "conn.php";

//picking contents from front end app
//$received_username = "Mbarara";
//$received_password = "$2y$10$3/LuaYXG/MLhUhJjH7PHO.aqiED52lVu7nsma4azOeWH8efKZ3u9m";
$received_username = $_POST['biz_username'];
$received_password = $_POST['biz_pass'];

//encrypting using Bcrypt
//$encrypted_password ="$2y$10$3/LuaYXG/MLhUhJjH7PHO.aqiED52lVu7nsma4azOeWH8efKZ3u9m";
$encrypted_password = password_hash($received_password, PASSWORD_DEFAULT);

//connect to db
$sql =  "SELECT * FROM users WHERE username = '$received_username' AND password = '$encrypted_password'";
$result = $conn->query($sql);
	if($result->num_rows >0){
		//output data for each row
        echo "There is some output";
		while($row = $result->fetch_assoc()){
			echo $row["id"]."#";
			echo $row["email"]."#";
			echo $row["email_verified_at"]."#";
			echo $row["username"]."#";
			echo $row["password"]."#";
			echo $row["IsApproved"]."#";
			echo $row["workshop"]."#";
			echo $row["created_at"]."#";
		}
	}else {
		echo "0";
	}
// //verifying user 
// if (password_verify('rasmuslerdorf', $encrypted_password)) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password.';
// }

?>
