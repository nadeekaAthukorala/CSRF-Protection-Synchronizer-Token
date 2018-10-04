<?php
session_start();

require_once('Token.php');

$username = "admin";
$password = "1234qwerty";

$self = $_SERVER['REQUEST_URI'];

if(isset($_SESSION['login'])){

    echo "<h5>Welcome ". $_SESSION['login']."</h5>";
    header("Location: $_SERVER[PHP_SELF]");

    if (isset($_POST['quantity'], $_POST['product'], $_POST['token'])){

        $quantity = $_POST['quantity'];
        $product = $_POST['product'];
    }
    if (!empty($quantity) && !empty($product)){
        if (checkToken($_POST['token'])){
            echo "<h4> Your submission is valid: Order can be processed </h4>";
        }
    }
}
else if ($_POST[ "username"] == $username && $_POST["password"] == $password){

    $_SESSION['login'] = $username;
}
else {
    echo "<script>alert('username or password incorrect!')</script>";
    echo "<script>location.href='Login.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.banner {
    width: 50%;
    border-radius: 0;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>

<h1>Welcome to Cross Site Request Forgery Demo</h1>

<form action="" method="POST">
<div class="imgcontainer">
    <img src="https://www.dhresource.com/0x0s/f2-albu-g5-M01-8C-59-rBVaI1k3pZ-ADU-UAAGjI7EDYF0263.jpg/hard-cover-mini-notebook-episode-diary-book.jpg" alt="Banner" class="banner">
</div>
<div class="container">
    <input type="text" placeholder="Enter the quantity of diaries you wish to purchase" name="quantity" required>
    <input type="hidden" name="product" required>
    <input type="hidden" name="token" value="<?php echo generateToken(); ?>">
    <button type="submit">Add to cart </button>
    <p> Not interested? <a href="Logout.php">Logout</a>
</div>
</form>
</body>
</html>

