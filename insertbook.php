<?php

include 'library/DBConnection.php';

$error=[];

// https://www.php.net/manual/en/function.filter-input.php
// https://www.php.net/manual/en/filter.filters.php

//sanitizing is removing anything not adhering to the filter
//filter_input (TYPE OF INPUT, INPUT NAME , FILTER NAME/TYPE - see on PHP.net)
$name = filter_input(INPUT_POST, 'name',  FILTER_SANITIZE_STRING);
$author = filter_input(INPUT_POST, 'author',  FILTER_SANITIZE_STRING);
$publisher = filter_input(INPUT_POST, 'publisher',  FILTER_SANITIZE_STRING);
$isbn = filter_input(INPUT_POST, 'isbn',  FILTER_SANITIZE_NUMBER_INT);
$published_date = filter_input(INPUT_POST, 'published_date',  FILTER_SANITIZE_URL);

//make input required
//checks to see if the $name is set (should be) or if it is empty
//if it is initialize the error array with a message
if(!isset($name) || empty($name)){
        $error['name'] = 'Book name is required';
}
if(!isset($author) || empty($author)){
        $error['author'] = 'Author name is required';
}
if(!isset($publisher) || empty($publisher)){
        $error['publisher'] = 'Publisher name is required';
}
if(!isset($isbn) || empty($isbn) ){
        $error['isbn'] = 'ISBN is required';
}
if(!isset($published_date) || empty($published_date)){
        $error['published_date'] = 'Published date is required';
}

//make sure the publisher exists before submitting it to the database
$sql = "SELECT name FROM publisher";
$result = $conn->query($sql);
$publisher_exists=false;
while($row= $result->fetch_assoc()){
        if($publisher === $row['name']){
                $publisher_exists=true;
        }
}
if($publisher_exists==false){
        $error['publisher'] = 'Publisher doesn\'t exist';
}

//if there are no errors and error array is empty
//send to database
if(empty($error)){
        //prepare and bind
        //everything has to be the exact same as it is in the database
        $sql = "INSERT INTO book (name, author, publisher, isbn, published_date) 
        VALUES (?,?,?,?,?)";

        //prepared statement
        $stmt = $conn->prepare($sql);

        //the variables are at your own choice, 
        //they do not require to be the exact same as the columns in the database
        $stmt->bind_param("sssss", $name, $author, $publisher, $isbn, $published_date);

        //send to database
        $stmt->execute();
        $conn->close();

        header("Location: index.php");
}else{ 
        //if there are errors draw the NewBook.php page
        //drawing the page rather than redirecting will let us
        //acces the $error array and all the variables set at the
        //top of the page
        require_once('NewBook.php');
}
?>