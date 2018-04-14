<?php
	session_start();
	// If user is not authorised redirect to login page
	if(!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}
    $connection = mysqli_connect("127.0.0.1","root","","lostAndFound");
    $error ='';
	if (isset($_REQUEST['submit'])){
		$username =$_SESSION['username']->name;
		$username = strtolower($username);
		$subject = $_REQUEST['subject'];
		$details = $_REQUEST['details'];


		if (empty($username)){
			$error .= 'please enter username<br/>';
		}
		if (empty($subject)){
			$error .= 'please enter subject<br/>';
		}
		if (empty($details)){
			$error .= 'please enter details';
		}
		if (!empty($username) and !empty($subject) and !empty($details)){

			$query  = "INSERT INTO lost_objects SET
			id='',
			userid='$username',
			subject='$subject',
			details='$details',
			time=NOW()";

			mysqli_query($connection , $query);
			header( "refresh:1;url=success.php" );						
		}
	}

?>
<?php
    include("header.php");
	include("panel-lost.php");
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

include("footer.php")

?>
