<?php

  	include("header.php");
  	include("panel-found.php");
  	
  	session_start();
  	$var=$_SESSION['complaintid'];
  	$error = '';
  	$userid = $_SESSION['userid'];

  	 if (isset($_REQUEST['submit'])){
	    	$username =$_REQUEST['username'];
	    	$username = strtolower($username);
			$password=$_REQUEST['password'];
			
		if (empty($username)){
			$error .= 'please enter username<br/>';
		}
		if (empty($password)){
			$error .= 'please enter password<br/>';
		}
		if (!empty($username) and !empty($password)){

			if($username === $userid){

			#have to ADD LDAP authorization CODE here afterwards. delete from DB only when present in LDAP directory and 
			#userid is equal to username in LDAP				
	  				$connection = mysqli_connect("localhost","root","","lost and found");
					$delete_query = "DELETE FROM found_objects WHERE id='$var';";
						mysqli_query($connection,$delete_query);
						header("Location:success.php");
			}
			else{
				$error .='wrong credentials';
			}
		}
	}
	
?>


<center>
	<div class="row box" >
	<div class="col-md-12 col-xm-12" style=" width: auto; text-align: center;">
	<form action="delete_found.php" method="POST">
		<?php 
			echo "<span style='color:red; margin-left:30%;'>$error</span>";
		?>
	<fieldset class="field-container">
		<legend style="color: white;">Enter Details</legend>
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
			<tr >
				<td colspan="10" align="center" ><input type="submit" class="subbutton" name="submit" value="submit"/></td>
			</tr>
		</table>	
	</fieldset>
	</form>
	</div>
	</div>
</center>	
