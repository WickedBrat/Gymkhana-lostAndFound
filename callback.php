<?php
    require_once "config.php";

    // If there's already a session just get the token
    if (isset($_SESSION['access_token'])) {
        $gClient->setAccessToken($_SESSION['access_token']);
    } 
    // If there is no access token get from code
    else if (isset($_GET['code'])) {
        $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $token;
    }
    else {
        header('Location: http://localhost/login.php');
        exit(); 
    }

    $oAuth = new Google_Service_Oauth2($gClient);
    
    $user = $oAuth->userinfo_v2_me->get();
    $_SESSION['userid']=$user['id'];
    $_SESSION['useremail']=$user['email'];
    $_SESSION['username']=$user['name'];
   
	if (strpos($user->email, 'iiita.ac.in')) {
        header( "Location: lost_form.php" );   
    } else {
        header( "Location: incorrectlogin.php" );
        unset($_SESSION['access_token']);
        unset($authUrl);
        session_destroy();
    }
?>

