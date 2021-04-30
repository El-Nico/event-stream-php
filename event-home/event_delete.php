<?php

    // include db name
    require '../config.php';       

    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        
        if(isset($_POST['event_ids'])) {
            
            $sql = 'DELETE FROM `events` WHERE `id` = '.$_POST['event_ids'].'';
            $result = mysqli_query($conn, $sql);
            if($result){
                // redirect to event-home/index
                echo '<br/> Event: Deleted Successful!' .$_POST['event_ids'] ;
                header("Location: index.php");

            }else{
                // return false
                echo '<br/> Event: Can not be Deleted!'. $_POST['event_ids'];
                header("Location: index.php");
            } 
          
          }else{
              echo '<br/> Empty Event_id;';
              header("Location: index.php");
          }

    }


    ?>