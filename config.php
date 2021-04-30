<?php

    $config=array(
        'DB_HOST'      => 'localhost',
        'DB_USERNAME'  => 'root',
        'DB_PASSWORD'  => '',
        'DB_DATABASE'  => 'event_app'
    );

    try
    {
        $host   = $config['DB_HOST'];
        $dbname = $config['DB_DATABASE'];
        $conn = new mysqli($config['DB_HOST'], $config['DB_USERNAME'],  $config['DB_PASSWORD'], $config['DB_DATABASE']);

        // $conn   = new PDO("mysql:host=$host;dbname=$dbname",$config['DB_USERNAME'],$config['DB_PASSWORD']);
    }
    catch(PDOException $e)
    {
        echo "Error:".$e->getMessage();
    }


?>