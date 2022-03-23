
<?php
    // echo phpversion();

    # DB Connection check
    /*
      $servername = "localhost";
      $username = "root";
      $password = "";
  
      // Create connection
      $conn = new mysqli($servername, $username, $password);
  
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      echo "Connected successfully";
      die;
     
    */

    session_unset();  
    require_once  'controller/Controller.php';
    $controller = new Controller();
    $controller->mvcHandler();
?>  
