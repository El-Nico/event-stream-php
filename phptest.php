<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>This is a Heading</h1>
<p>This is a paragraph. </p>
<?php 
    $name = 'Joe';
    echo 'My name is '. $name . ' and is awesome.';
    echo "<h4>This is an element from php by $name </h4>";
    echo '<h4>This is an element from php by $name </h4>';

    $a = array (
        'a' => 'apple', 
        'b' => 'banana', 
        'c' => array ('x', 'y', 'z'));
    
    $b = ['apple', 'banana', 'peach'];

    $c = [ 'a'=>'apple', 'b'=> 'banana', 'p' => 'peach'];


    echo $a;

    echo '<pre>';
    print_r($b);
    echo '</pre>';

    echo gettype($name);

    $name  = 123;

    
    echo "\n".gettype($name);

    echo "\n".gettype($a);
    echo "<br><br>";
    for($i = 1; $i<5;$i++) {
        echo $i."<br>";
    }

    for($i = 0; $i<count($b); $i++){
        echo "<br>".$b[$i];
    }
    
    echo "<br><br>";

    foreach($c as $f){
        echo "<br> $f";
    }

    echo "<br><br>";

    function maths($arg_1, $arg_2){
        return $arg_1 + $arg_2;
    }
    echo "<br><br>";
    echo maths(2,3);


?>

</body>
</html>