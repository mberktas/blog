<?php include "db.php";



if(isset($_POST["commentsubmit"])){
    $name = $_POST["commentName"];
    $context = $_POST["commentContext"];
    $blog_id = $_GET["blog_id"];
    $sql_query = "INSERT INTO comments(comment_name,comment_context,blog_id) VALUES('$name','$context','$blog_id' )";
    $sql = mysqli_query($conn , $sql_query);

    if($sql){
        echo "asdasd"; 
    }
    else
        echo "tt";
}

?>