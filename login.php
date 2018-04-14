<?php
    require_once "config.php";

    // If user is authorised redirect to lost_form.php
    if(isset($_SESSION['access_token'])) {
        header('Location: lost_form.php');
        exit();
    }

    $loginURL = $gClient->createAuthUrl();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lost and Found</title>
</head>
<body>
  <div>
	  <h3>Login with Gmail to continue</h3>
	  <div>Please click login button to connect to Google.</div>
	  <!-- <a class="login" href="' . $authUrl . '"><img src="https://developers.google.com/+/images/branding/sign-in-buttons/Red-signin_Google_base_44dp.png" /></a>'; -->
  </div>
    <form action="">
        <input type="button" value="Login with Google" onclick="window.location = '<?php echo $loginURL ?>';">
    </form>
</body>
</html>
