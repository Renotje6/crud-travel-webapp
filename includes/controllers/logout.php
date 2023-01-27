<?php 
    require_once("../config.php");
    require_once ROOT_PATH . 'includes/functions/sessions.php';

    startSession();
    destroySession();
    header('Location: ' . BASE_URL . 'index.php');
