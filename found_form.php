<?php
    

    include("header.php");
    include("panel-found.php");
    $error ='';

		 if (isset($_REQUEST['submit'])){
	    	$username =$_REQUEST['username'];
	    	$username = strtolower($username);
			$password=$_REQUEST['password'];
			$subject = $_REQUEST['subject'];
			$details = $_REQUEST['details'];

			if (empty($username)){
				$error .= 'please enter username<br/>';
			}
			if (empty($password)){
				$error .= 'please enter password<br/>';
			}
			if (empty($subject)){
				$error .= 'please enter subject<br/>';
			}
			if (empty($details)){
				$error .= 'please enter details';
			}
			if (!empty($username) and !empty($password) and !empty($subject) and !empty($details)){

						$connection = mysqli_connect("localhost","root","","lost and found");
						$query  = "INSERT INTO found_objects SET
								id='',
								userid='$username',
								password='$password',
								subject='$subject',
								details='$details',
								time=NOW()";

						mysqli_query($connection , $query);
						header( "refresh:1;url=success.php" );	
			}
					
			}
?>

<link type="text/css" rel="stylesheet" href="css/main.css">
<center>
	<div class="row box" >
	<div class="col-md-12 col-xm-12" style=" width: auto; text-align: center;">
	<form action="found_form.php" method="POST">
		<?php 
			echo "<span style='color:red;'>$error</span>";
		?>
	<fieldset class="field-container">
		<legend style="color: white;">enter Details</legend>
		<table>	
			<tr class="row">
				<td class="col-md-4 col-xm-10" align="center">LDAP username</td>
				<td class="col-md-1 col-xm-2">:</td>
				<td class="col-md-7 col-xm-12"><input type="text" name="username" /></td>
			</tr>
			<tr class="row">
				<td class="col-md-4 col-xm-10" align="center">LDAP Password</td>
				<td class="col-md-1 col-xm-2" >:</td>
				<td class="col-md-7 col-xm-12"><input type="password" name="password" /></td>
			</tr>
            <tr class="row">
				<td class="col-md-4 col-xm-10" align="center">subject</td>
				<td class="col-md-1 col-xm-2" >:</td>
				<td class="col-md-7 col-xm-12"><input type="text" name="subject" /></td>
			</tr>
            <tr class="row" rowspan="3" style="height: 30px;">
				<td class="col-md-4 col-xm-10" align="center">Enter Object Details</td>
				<td class="col-md-1 col-xm-2">:</td>
				<td class="col-md-7 col-xm-12"><textarea type="text" name="details" style="height: 100px; width: 217px; padding-top: 0px;"></textarea></td>
			</tr>    
			<tr >
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