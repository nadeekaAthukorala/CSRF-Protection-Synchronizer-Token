<?php
function generateToken( $formName ) 
{
    $secretKey = 'gsfhs154aergz2#';
    if ( !session_id() ) {
        session_start();
    }
    $sessionId = session_id();
 
    $CSRF_Token_Value = md5( $formName.$sessionId.$secretKey );

    return $CSRF_Token_Value;
 
}

function checkToken( $token, $CSRF_Token_Value) 
{
    return $token === $CSRF_Token_Value;
}


?>