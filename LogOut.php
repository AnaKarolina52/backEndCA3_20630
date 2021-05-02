<?php

//This is the easy way to logout you just destroy the session
session_start();
if(isset($_SESSION)){
    session_destroy();
    
}
header('Location: index.php');
