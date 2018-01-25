 <?php
include_once "db.inc.php";
if(isset($_SESSION["u_id"])){
    if(isset($_GET["submit"])){
        if(!empty($_GET["title"]) && !empty($_GET["author"]) && !empty($_GET["price"])){
            header("Location: ../addbook.php?add=empty");
        }
        else{
            $title = $_GET["title"];
            $author = $_GET["author"];
            $price = $_GET["price"];
            $addedby = $_SESSION["u_id"];
            $data = $conn->query("INSERT INTO onlinebookfinder.books(title,author,addedby,price) VALUES('$title','$author','$addedby','$price');");
        }
    }
}
else{
    header("Location: ../addbook.php?loggedin=false");
}