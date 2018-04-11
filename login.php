<?php


session_start(); //session start

require_once ('libraries/Google/autoload.php');

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '344830946543-3ubtooodmsmqs64kg0a2mln1p1lsqp1n.apps.googleusercontent.com'; 
$client_secret = 'ACvY7zfvNRarncbDn-vUHsG3';
$redirect_uri = 'http://localhost:9000/lost_form.php';

//database
$db_username = "root"; //Database Username
$db_password = ""; //Database Password
$host_name = "127.0.0.1"; //Mysql Hostname
$db_name = 'lostAndFound'; //Database Name

//incase of logout request, just unset the session var
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
  session_destroy();
}
/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");
/************************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 ************************************************/
$service = new Google_Service_Oauth2($client);
/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
*/
  
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}
/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}


//Display user info or display login url as per the info we have.
if (isset($authUrl)){ 
	echo '<div>';
	echo '<h3>Login with Gmail to continue</h3>';
	echo '<div>Please click login button to connect to Google.</div>';
	echo '<a class="login" href="' . $authUrl . '"><img src="https://developers.google.com/+/images/branding/sign-in-buttons/Red-signin_Google_base_44dp.png" /></a>';
  echo '</div>';
	
} else {
	
  $user = $service->userinfo->get(); //get user info 
  


    $_SESSION['userid']=$user->id;
    $_SESSION['useremail']=$user->email;
    $_SESSION['username']=$user->name;
    // $_SESSION['authURL']=$authUrl;

		if (strpos($user->email, 'iiita.ac.in')) {
            ?>
<center style="color: white;">
	<div class="row box form" >
	<form action="" method="POST">
	<fieldset>
		<legend style="color: white;">Enter Details</legend>
		<table>	
      <tr class="row">
				<td align="center">Subject</td>
				<td>:</td>
    
			</tr>
				<td><input type="text" name="subject" style="width:400px" /></td>
      <tr class="row">
				<td align="center">Enter Object Details</td>
				<td>:</td>
			</tr>
				<td>
                    <textarea type="text" name="details" style="height: 100px; width: 400px; padding-top: 0px;"></textarea>
                </td>
			</tr>    
			<tr >
            <br><br>
				<td colspan="10" align="center" ><input type="submit" class="subbutton" name="submit" value="submit"/></td>
			</tr>
		</table>	
	</fieldset>
	</form>
	</div>
	</div>
</center>

<?php
		} else {
            header( "refresh:1;url=incorrectlogin.php" );
            unset($_SESSION['access_token']);
            unset($authUrl);
			session_destroy();
        }
}


?>