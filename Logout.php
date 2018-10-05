<?php

$cookie_name = session_name();
session_start();
    
if(isset($_SESSION['login']))
{
    setcookie($cookie_name, session_id(), time() - (60), "/",null,null,true);
    session_destroy();
    echo "<script>location.href='Login.php'</script>";
}
else{

    echo "<script>location.href='Login.php'</script>";
}



#if(isset($_GET['logout']))
#{
	#unset($_SESSION['login']);
#}

?>