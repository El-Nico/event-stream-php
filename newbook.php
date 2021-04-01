
<?php 

include 'NavBar.php';
include 'library/DBConnection.php'; 

if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
?>
    <div class="container">
        
        <h1>Insert book</h1>
        <form action="InsertBook.php" class="needs-validatio" novalidate method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Book Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="<?php if(isset($name)){ echo $name;}  ?>" >
                <!-- show error to user  -->
                <span class="text-danger">
                    <?= isset($error['name']) ? $error['name'] : ''?> 
                </span>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="<?= (isset($author)) ? $author : NULL ?>" aria-describedby="authorHelp">
                <span class="text-danger"><?= isset($error['author']) ? $error['author'] : '' ?> </span>
           </div>
            <div class="mb-3">
                <label for="publisher" class="form-label">Publisher</label>
                <select class="form-select" aria-label="publisher" name="publisher" id="publisher">
                    <?php

                        $sql = "SELECT name FROM publisher";
                        $result = $conn->query($sql);
                        while($row=$result->fetch_assoc()){
                            echo "<option value='".$row['name']."'>".$row['name']."</option>";
                        }


                    ?>


                </select>

                <!-- <input type="text" class="form-control" id="publisher" name="publisher" value="<?= (isset($publisher))? $publisher : NULL ?>" aria-describedby="publisherHelp"> -->
                <span class="text-danger"><?= isset($error['publisher']) ? $error['publisher'] : '' ?> </span>
           </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="<?= (isset($isbn))? $isbn : NULL ?>" aria-describedby="isbnHelp">
                <span class="text-danger"><?= isset($error['isbn']) ? $error['isbn'] : '' ?> </span>
           </div>
            <div class="mb-3">
                <label for="published_date" class="form-label">Published Date</label>
                <input type="text" class="form-control" id="published_date" name="published_date" value="<?= (isset($published_date))? $published_date : NULL ?>" aria-describedby="published_dateHelp">
                <span class="text-danger"><?= isset($error['published_date']) ? $error['published_date'] : '' ?> </span>
           </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    

   
</body>
</html>