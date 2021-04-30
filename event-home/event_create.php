<?php

    // include db name
    require '../config.php';       

    if ($_SERVER["REQUEST_METHOD"] == "POST") {       

        if (isset($_POST['get_event_data'])) {  

            $sql = 'SELECT * FROM `events` WHERE `id` = '.$_POST['get_event_data'].'';
            $result = mysqli_query($conn, $sql);
            if (!$result) {                   
                die("Could not run query ".mysqli_error($conn));
            }else{
                $getData = mysqli_fetch_assoc($result);
                echo json_encode($getData);
            }            
        }
        else if (isset($_POST['delete_event_data'])) {  
            echo $_POST['delete_event_data'];
            // $sql = 'DELETE FROM `events` WHERE `id` = '.$_POST['delete_event_data'].'';
            // $result = mysqli_query($conn, $sql);
            // if (!$result) {                   
            //     die("Could not run query ".mysqli_error($conn));
            // }else{
            //     $getData = "true";
            //     echo json_encode($getData);
            // }            
        }else if( isset($_POST['event_id'])) {
            if(empty($_POST["event_title"])){
                header("Location: index.php");
            }

            if(!empty($_FILES["formFileSm"]["name"])){
                $target_dir = "images/";
                $bannerImageName = time() . '-' . $_FILES["formFileSm"]["name"];
                $target_file = $target_dir . basename($bannerImageName);

                // check if file exists
                if(file_exists($target_file)) {
                    $msg = "File already exists";
                    $msg_class = "alert-danger";
                }

                if(move_uploaded_file($_FILES["formFileSm"]["tmp_name"], $target_file)) {
                    echo "<br/> Image uploaded ";
                }else{
                    echo "<br/> Image not uploaded ";
                }

                $result = save_event($_POST["event_title"], $_POST["event_desc"],$_POST["datetime-local"],$target_file,$_POST["event_id"] , $config);
            }else{
                echo '<br/> No Image';
                $result = save_event($_POST["event_title"], $_POST["event_desc"],$_POST["datetime-local"],$_POST["formFileSm"],$_POST["event_id"] , $config);

            }

            // check if name only contains letters and whitespace
            if($result){
                // redirect to event-home/index
                echo '<br/> Event: Created Successful!';
                header("Location: index.php");

            }else{
                // return false
                echo '<br/> Event: Can not be Created!';
                header("Location: index.php");
            }
          }

    }else{
        echo $_SERVER["REQUEST_METHOD"];
    }

    function save_event($event_name, $event_desc, $event_time, $event_banner, $event_id, $config) {
        
       
        $conn = mysqli_connect($config["DB_HOST"],$config["DB_USERNAME"],$config["DB_PASSWORD"],$config["DB_DATABASE"]);        
        if($event_id == 0){
            // Create Event
            $sql_insert = "INSERT INTO `events`( `event_name`, `event_desc`, `event_date`, `event_banner`)
                VALUES ('$event_name', '$event_desc','$event_time', '$event_banner' );  ";
            // register the event
            if ($conn->query($sql_insert) === TRUE) {
                // echo "<br/>Event record created successfully<br/>";
                return true;
              } else {
                // echo "Error: " . $sql_insert . "<br>" . $conn->error;
                return false;
              }

        }else{
            // Update Event
            $sql_update = "UPDATE `events` SET `event_name`= '$event_name' ,`event_desc`= '$event_desc',`event_date`= '$event_time',`event_banner`= '$event_banner' WHERE `id` = '$event_id'";
            if ($conn->query($sql_update) === TRUE) {
                // echo "<br/> Event Updated Successfully<br/>";
                return true;
            } else {
                // echo "Error: " . $sql_update . "<br>" . $conn->error;
                return false;
            }
            
        }        

    }

?>