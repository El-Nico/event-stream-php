<!DOCTYPE html>
<html>
<head>
<title>Form Exmaple</title>
</head>
<body>

<h1>Form Exmaple</h1>
        This is the index page.
    <form action="posted.php" method="POST">
        Name
        <input type ="text" name="name" id="name" >
        <br>
        Password
        <input type ="password" name="password" id="password">
        <br>
        Email
        <input type ="email" name="email" id="email">
        <br>
        <input type ="submit" name="submit" id="submit">
    </form>

    <?php 
        if (array_key_exists("submit",$_GET)){
            if($_GET['submit'] == "true"){
                echo "Stuff was submitted";
            }
        }
        ?>
</body>
</html>