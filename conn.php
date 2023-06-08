<?php
try{
      $servername="10.5.0.235:3306";
      // $username  ="app";
      // $password ="1234Uganda*";
      // $dbname = "nomadapp";
      $username  ="famina";
      $password ="f)gzd8cu5eq4U!hd";
      $dbname = "nomadapp";
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      if (!$conn)
      {
            die('Could not connect to MySQL: ' . mysqli_error($conn));
            echo"connection not successful";
      }else{
            //echo("DB connection successful");
            }
}catch(Exception $e) {
      echo 'Message: ' .$e->getMessage();
  }

?>

