<?php

/* 
    * This function checks if a session is started and starts one if not.
*/
function startSession()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

/* 
    * This function checks if the user is logged in and redirects to the login page if not.
    * If the user is logged in, the last_ping time is updated.
*/
function checkSession()
{
    if (!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true && $_SESSION['last_ping'] < time() - 600) {
        // If the user is not logged in, the current page is saved in the session.
        $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
        header('Location: ' . BASE_URL . 'pages/login.php');
    } else {
        $_SESSION['last_ping'] = time();
    }
}

/* 
    * This function checks if the user is logged in and redirects to the index page if so.
*/
function checkIfNotLoggedIn()
{
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        header('Location: ' . BASE_URL . 'index.php');
    }
}

/* 
    * This function destroys the session.
*/
function destroySession()
{
    startSession();
    $_SESSION = array();
    session_destroy();
}
