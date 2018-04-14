<?php
	include("header.php");
	include("panel-lost.php");
	session_start();
	$_SESSION['complaintid']=$_REQUEST['id'];
	$_SESSION['userid'] = $_REQUEST['userid'];
	
 echo "<center>
	<div class='row box'>
	<div class='col-md-12 col-xm-12' style='width: auto; text-align: center;'>
	<fieldset class='field-container'>
		<legend style='color: white; padding-left:30%;'>Details</legend>
		<table>	
			<tr class='row'>
				<td align='center'>Reported by</td>
				<td >:</td>
				<td >".$_REQUEST['userid']."</td>
			</tr>
            <tr class='row'>
				<td align='center'>subject</td>
				<td  >:</td>
				<td >".$_REQUEST['subject']."</td>
			</tr>
            <tr class='row' rowspan='3' style='height: 30px;'>
				<td align='center'>Object Details</td>
				<td >:</td>
				<td >".$_REQUEST['details']."</td>
			</tr>    
			 <tr class='row' style='height: 30px;'>
				<td align='center'>Complaint No.</td>
				<td >:</td>
				<td >".$_REQUEST['id']."</td>
			</tr>
		</table>	
	</fieldset>
	</div>
	</div>
</center>";

?>