<?php

    session_start();

    require_once "libraries/GoogleAPI/vendor/autoload.php";
    $gClient = new Google_Client();
    $gClient->setClientId("323065339705-aqf7bnv02k2gofaa2tttn9lpq0qi12u9.apps.googleusercontent.com");
    $gClient->setClientSecret("42Dkuxw2mncmAnjPERCuaD5v");
    $gClient->setApplicationName("Lost and Found");
    $gClient->setRedirectUri("http://localhost/callback.php");
    $gClient->setScopes(array("https://www.googleapis.com/auth/plus.login", "https://www.googleapis.com/auth/userinfo.email"));

?>