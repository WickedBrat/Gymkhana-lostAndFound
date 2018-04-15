<?php
	include("header.php");
	include("panel-found.php");
	session_start();
	// $_SESSION['complaintid']=$_REQUEST['id'];
	$_SESSION['userid'] = $_REQUEST['userid'];
	
 echo "<center style='max-width:55%; font-size: 20px;'>
	<div class='row box'>
	<div class='col-md-12 col-xm-12' style='width: auto; text-align: center;'>
	<fieldset class='field-container'>
		<legend>Details</legend>
		<table>	
			<tr class='row'>
				<td align='left'>Reported By</td>
				<td >:</td>
				<td align='right' >".$_REQUEST['userid']."</td>
			</tr>
            <tr class='row'>
				<td align='left'>Subject</td>
				<td  >:</td>
				<td align='right' >".$_REQUEST['subject']."</td>
			</tr>
            <tr class='row' rowspan='3' style='height: 30px;'>
				<td align='left'>Object Details</td>
				<td >:</td>
				<td align='right' >".$_REQUEST['details']."</td>
			</tr>    
			 <tr class='row' style='height: 30px;'>
				<td align='left'>Complaint No</td>
				<td >:</td>
				<td align='right' >".$_REQUEST['id']."</td>
			</tr>
		</table>	
	</fieldset>
	</div>
	</div>
</center>";

	include("footer.php");
?>