<?php
	
	include("header.php");
	include("panel-home.php");
	$connection = mysqli_connect("localhost","gymkhanadba","gymwimpass123","gymkhana");
	$select_query_lost = "SELECT * FROM lost_objects ORDER BY id DESC";
	$result_lost = mysqli_query($connection,$select_query_lost);
	#$results_lost = array();
	$select_query_found = "SELECT * FROM found_objects ORDER BY id DESC";
	$result_found = mysqli_query($connection,$select_query_found);
?>

<center>
<div class="row table">
	<table class="view_table" style="float: left;">
		<tr>
			<td class="table-head">OBJECTS FOUND</td>
		</tr>
		<?php
		while($row_found = mysqli_fetch_assoc($result_found)){
	    	//iterate over all the fields
		    #foreach($row_found as $key_found => $val_found){
		   
		     $id_found  = $row_found['id'];
		     $userid_found=$row_found['userid'];
		     $details_found=$row_found['details'];
		     $subject_found = $row_found['subject'];
		        //generate output
		        echo "<tr>
						<td class='table-item'><form method='POST' action='viewport_found.php'>
													<input type='hidden' name='id' value='$id_found'/>
													<input type='hidden' name='subject' value='$subject_found'/>
													<input type='hidden' name='userid' value='$userid_found'/>
													<input type='hidden' name='details' value='$details_found'/>
													<input style='font-family:serif; background:none; border:none; font-size:20px; word-wrap: break-word;' type='submit' value='$subject_found'/>
							                   </form>
						</td>
					  </tr>";
		}
		?>
	
	</table>	
	<table class="view_table">
		<tr>
			<td class="table-head">OBJECTS LOST</td>
		</tr>
		<?php

		while($row_lost = mysqli_fetch_assoc($result_lost)){
	    	#$results_lost[] = $row_lost;
	    	 $id_lost  = $row_lost['id'];
		     $userid_lost=$row_lost['userid'];
		     $details_lost=$row_lost['details'];
		     $subject_lost = $row_lost['subject'];
		    #foreach($results_lost as $key_lost => $val_lost){
		     #   //generate output
		        echo "<tr>
						<td class='table-item'><form method='POST' action='viewport_lost.php'>
													<input type='hidden' name='id' value='$id_lost'/>
													<input type='hidden' name='subject' value='$subject_lost'/>
													<input type='hidden' name='userid' value='$userid_lost'/>
													<input type='hidden' name='details' value='$details_lost'/>
													<input style='font-family:serif; background:none; border:none; font-size:20px; word-wrap: break-word;' type='submit' value='$subject_lost'/>
							                   </form>
						</td>
					  </tr>";
	#	    }
		}

		?>
	</table>	
</div>
</center>
<?php

include("footer.php")

?>