<?php

define("USER_KEY","user_connect");
define("ROLE_JOUEUR","ROLE_JOUEUR");
define("ROLE_ADMIN","ROLE_ADMIN");

function is_connect():bool{
    return isset($_SESSION[USER_KEY]);
}
function is_joueur():bool{
    return is_connect() && $_SESSION[USER_KEY]['role']==ROLE_JOUEUR;
}
function is_admin():bool{
    return is_connect() && $_SESSION[USER_KEY]['role']==ROLE_ADMIN;
}