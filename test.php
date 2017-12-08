<?php

require_once('frame_header.php');
require_once 'sqlconnection.php';

$result = $conn->query("select * from user ");

		if($result->num_rows !== 0){	// match found results 
			// output data of each row
			while($row = $result->fetch_assoc()){
				$n = count($row);
				
				foreach ($row as $x) {
					echo "<tr>".$x."</tr>";
					
				}
				echo "<br>";
			/*foreach($row as $x => $x_value) {
				echo "Key=" . $x . ", Value=" . $x_value;
				echo "<br>";
			}
			}
			while($row = $result->fetch_assoc()){
						// info
						echo "---RESTAURANT ID: ".$row['rid'] ." ---RESTAURANT NAME: ".$row['rname'].
						" ---RESTAURANT DESCRIPTION: " .$row['description']." ---RESTAURANT ADDRESS: " .$row['raddress'];
					
						//echo  '<br />';
						*/
			}
		}

		require_once('frame_footer.php');
?>