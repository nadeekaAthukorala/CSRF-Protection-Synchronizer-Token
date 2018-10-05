<?php
function generateToken( $formName ) 
{
    $secretKey = 'gsfhs154aergz2#';
    if ( !session_id() ) {
        session_start();
    }
    $sessionId = session_id();
 
    return md5( $formName.$sessionId.$secretKey );
 
}

function checkToken( $token, $formName) 
{
    return $token === generateToken( $formName );
}


?>