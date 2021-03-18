<?php



include 'connection.php';



//prepare and bind
//everything has to be the exact same as it is in the database
$sql = "INSERT INTO book (name, author, publisher, isbn, published_date) 
        VALUES (?,?,?,?,?)";

$stmt = $conn->prepare($sql);

//the variables are at your own choice, 
//they do not require to be the exact same as the columns in the database
$stmt->bind_param("sssss", $name, $author, $publisher, $isbn, $published_date);

$name = $_POST["name"];
$author = $_POST["author"];
$publisher = $_POST["publisher"];
$isbn = $_POST["isbn"];
$published_date = $_POST["published_date"];

$stmt->execute();
$conn->close();

header("Location: books.php");


?>