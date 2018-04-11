<?php
    

    include("header.php");
    include("panel-found.php");
    $error ='';

	include('login.php');
		 if (isset($_REQUEST['submit'])){
			$username =$user->name;
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

						$connection = mysqli_connect("127.0.0.1","root","","lostAndFound");
						$query  = "INSERT INTO found_objects SET
								id='',
								userid='$username',
								subject='$subject',
								details='$details',
								time=NOW()";

						mysqli_query($connection , $query);
						header( "refresh:1;url=success.php" );	
			}
					
			}

include("footer.php")

?>
