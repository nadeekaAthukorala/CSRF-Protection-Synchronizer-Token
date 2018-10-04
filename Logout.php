<?php
session_start();

if(isset($_SESSION['login']))
{
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