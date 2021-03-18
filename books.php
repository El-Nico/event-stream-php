<!DOCTYPE html>
<html>
<head>
<title>Books Table</title>
</head>
<?php

include 'connection.php';




$sql = "SELECT * FROM book";
$result = $conn->query($sql);

if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo 
        "<br><br>Id: " . $row["id"]. 
        "<br>Name: " . $row["name"].
        "<br>Author:" .$row["author"].
        "<br>Publisher:". $row["publisher"].
        "<br>ISBN:". $row["isbn"].
        "<br>Published date:". $row["published_date"].
        "<br><button id='deletebook' onclick='deleteBook(".$row['id'].")'>Delete</button>".
        "<a href='updatebook.php?=".$row['id'].
        "'><button>Update</button></a>";
    }
}
    else {
        echo "0 results";
    }
?>
<script>
    function deleteBook(id){
        window.location.href = "deletebook.php?id="+id;
    }

</script>

<body>


</body>
</html>