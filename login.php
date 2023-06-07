
<?php
// Check connection
include "conn.php";

//picking contents from front end app
$received_username = "twenceb";
$received_password = "$2y$10$\TVXTi9jZZGqtLjB8spMhpuZP3ZUWmXxtjxX57DVfojitKQFolrLU2";
$received_username1 = $_POST['biz_username'];
$received_password1 = $_POST['biz_pass'];
$encrypted_password= "$2y$10$\TVXTi9jZZGqtLjB8spMhpuZP3ZUWmXxtjxX57DVfojitKQFolrLU2";

//encrypting using Bcrypt
//$encrypted_password ="$2y$10$3/LuaYXG/MLhUhJjH7PHO.aqiED52lVu7nsma4azOeWH8efKZ3u9m";
//$encrypted_password = password_hash($received_password, PASSWORD_DEFAULT);

// if (password_verify($received_password, $encrypted_password)) {
if ($received_password == $encrypted_password) {
	//echo ' Password is valid!';
	//connect to db
	$sql =  "SELECT * FROM users WHERE username = '$received_username'";
	$result = $conn->query($sql);
		if($result->num_rows >0){
			//output data for each row
			//echo "There is some output";
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

} else {
	echo ' Invalid password.';
}
// //verifying user 
// if (password_verify('rasmuslerdorf', $encrypted_password)) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password.';
// }

?>
