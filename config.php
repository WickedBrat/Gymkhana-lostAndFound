<?php

    session_start();

    require_once "libraries/GoogleAPI/vendor/autoload.php";
    $gClient = new Google_Client();
    $gClient->setClientId("344830946543-3ubtooodmsmqs64kg0a2mln1p1lsqp1n.apps.googleusercontent.com");
    $gClient->setClientSecret("ACvY7zfvNRarncbDn-vUHsG3");
    $gClient->setApplicationName("Lost and Found");
    $gClient->setRedirectUri("https://gymkhana.iiita.ac.in/lost-and-found/callback.php");
    $gClient->setScopes(array("https://www.googleapis.com/auth/plus.login", "https://www.googleapis.com/auth/userinfo.email"));

?>