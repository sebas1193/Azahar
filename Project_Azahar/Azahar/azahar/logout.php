<?php
    include_once('user_session.php');

    $UserSession = new UserSession();
    $UserSession->closeSession();

    header("location: index.php");

?>