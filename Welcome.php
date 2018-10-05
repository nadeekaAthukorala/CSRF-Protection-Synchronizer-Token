<?php
require_once('Token.php');

$cookie_name = session_name();
if (session_start()){
    setcookie($cookie_name, session_id(), time() + (60), "/",null,null,true);
}

$username = "admin";
$password = "1234qwerty";

$self = $_SERVER['REQUEST_URI'];

if(isset($_SESSION['login'])){

    echo "<h5>Welcome ". $_SESSION['login']."</h5>";
    header("Location: $_SERVER[PHP_SELF]");
}
else if ($_POST[ "username"] == $username && $_POST["password"] == $password){

    $_SESSION['login'] = $username;
    #print_r($_COOKIE);
    #$s = session_id();
    #echo "<p> session id ".$s."</p>";
    #echo "<p> login session ".$_SESSION['login']."</p>";
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

<form action="Demo.php" method="POST">
<div class="imgcontainer">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ5IwjwQXVEGX6CWa5p1uLkZWeGn210GtmGt6V80hQ0r4TPBepB" alt="Banner" class="banner">
    <p> Welcome, you are one step away to demo post!! </p>
</div>
<div class="container">
    <input type="text" placeholder="Enter your university name" name="university" required>
    <input type="hidden" name="token" value="<?php echo generateToken('WelcomeForm')?>">
    <button type="submit">Continue</button>
    <p> Not interested? <a href="Logout.php">Logout</a>
</div>
</form>
</body>
</html>

