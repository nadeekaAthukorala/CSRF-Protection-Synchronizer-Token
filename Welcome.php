<?php

$cookie_name = session_name();
if (session_start()) {
    setcookie($cookie_name, session_id(), time() + (864000), "/",null,null,true);
}

$username = "admin";
$password = "12345678";

$random1 = 'secret_key1';
$random2 = 'secret_key2';

$hash = md5($random1.$password.$random2); 

$self = $_SERVER['REQUEST_URI'];

if(isset($_SESSION['login']) && $_SESSION['login'] == $hash){

    echo "<h5> You have successfully logged in! <h5>";
}
else if ($_POST[ "username"] == $username && $_POST["password"] == $password){

    $_SESSION['login'] = $hash;
    #$_SESSION['login'] = $_POST['login'];
    print_r($_COOKIE);

    header("Location: $_SERVER[PHP_SELF]");
}
else {
    echo "<script>alert('username or password incorrect!')</script>";
    echo "<script>location.href='Login.php'</script>";
    
}

echo '
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

<form action="Logout.php" method="POST">
<div class="imgcontainer">
    <img src="https://cdn-images-1.medium.com/max/640/1*1jvRnwHNZMPiHBYMy1EwxA.png" alt="Banner" class="banner">
    <p> Read more about cross site request forgery on <a href="https://medium.com/@nadeekaathukorala/cross-site-request-forgery-protection-in-web-applications-12c263013b55">Medium</a>
</div>
<div class="container">
    <button type="submit">Logout</button>
</div>
</form>
</body>
</html>'
?>
