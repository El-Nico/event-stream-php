<?php

    // include db name
    include 'config.php';
       
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"] || $_POST["password"])) {
            $nameErr = "Name / password is required";
          } else {
            $result = authenticate($_POST["name"], $_POST["password"], $config);
            // check if name only contains letters and whitespace
            if($result){
                // redirect to event-home/index
                echo '<br/> Login: Successful!';
                header("Location: event-home/index.php");

            }else{
                // return false
                echo '<br/> Login: UNSuccessful!';
                header("Location: index.html");
            }
          }

    }

    function authenticate($user_name, $password, $config) {
        $conn = mysqli_connect($config["DB_HOST"],$config["DB_USERNAME"],$config["DB_PASSWORD"],$config["DB_DATABASE"]);

        $result = mysqli_query($conn,"SELECT * FROM users WHERE user_name='" . $user_name . "' and password = '". $password."'");
        $count  = mysqli_num_rows($result);
        if($count == 0) {
            return false;
        } else {
            return true;
        }

    }

?>