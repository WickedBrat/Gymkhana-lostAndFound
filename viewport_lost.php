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
				<td class='col-md-4 col-xm-10' align='center'>Reported by</td>
				<td class='col-md-1 col-xm-2'>:</td>
				<td class='col-md-7 col-xm-12'>".$_REQUEST['userid'].".iiita.ac.in</td>
			</tr>
            <tr class='row'>
				<td class='col-md-4 col-xm-10' align='center'>subject</td>
				<td class='col-md-1 col-xm-2' >:</td>
				<td class='col-md-7 col-xm-12'>".$_REQUEST['subject']."</td>
			</tr>
            <tr class='row' rowspan='3' style='height: 30px;'>
				<td class='col-md-4 col-xm-10' align='center'>Object Details</td>
				<td class='col-md-1 col-xm-2'>:</td>
				<td class='col-md-7 col-xm-12'>".$_REQUEST['details']."</td>
			</tr>    
			 <tr class='row' style='height: 30px;'>
				<td class='col-md-4 col-xm-10' align='center'>Complaint No.</td>
				<td class='col-md-1 col-xm-2'>:</td>
				<td class='col-md-7 col-xm-12'>".$_REQUEST['id']."</td>
			</tr>
			<tr >
				<td colspan='10' align='center'><div  style='background:#722f37; width:70px; text-align:center; border:none; border-radius:5px;'><a style='color:white;' href='delete_lost.php'>delete</a></div></td>
			</tr>
		</table>	
	</fieldset>
	</div>
	</div>
</center>";

?>