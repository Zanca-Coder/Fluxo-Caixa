<?php
/**
 * 
 */
class Auth
{
    
    public static function autentica()
    {
        @session_start();
        $logged = $_SESSION['nivel'];
        if ($logged == false) {
            session_destroy();
            header('Location: login/');
            exit;
        }
    }
    
}