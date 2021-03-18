<?php

include 'connection.php';


// sql to delete a record
$sql = "DELETE FROM book WHERE id=?";

$stmt=$conn->prepare($sql);

$stmt->bind_param("i", $id);

$id = $_GET['id'];

$stmt->execute();
$conn->close();


header("Location: books.php");

?>