<?php

    echo "Your details are here:<br>";
    echo "<p>".$_POST['name']."</p>";
    echo "<p>".$_POST['password']."</p>";
    echo "<p>".$_POST['email']."</p>";
    
    header("Location: index.php?submit=true");
?>