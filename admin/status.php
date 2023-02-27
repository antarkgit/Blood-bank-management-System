<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Blood Available</title>
</head>
<body style="align:center;">
	



	<section class="listings">
		<div class="wrapper">
		
			<ul class="properties_list">
			<?php
						include '../config.php';
						$sel = "SELECT SUM(unit) FROM bloodgroup";
						$rs = $con->query($sel);
						$rws = $rs->fetch_assoc();
			?>
				
					<center>
						<h2><span style="font-size:25px; color: blue;">Total Blood on bank:</span> <span style="color:#003333; 
						font-weight: bold; font-size: 25px;"><?php echo $rws['SUM(unit)'];?></span></h2>
						<div></div><?php 



								$conn= mysqli_connect('localhost', 'root', '');
								mysqli_select_db($conn,'blood_bank');

							    $statement = "select * from bloodgroup;";
$result = mysqli_query($conn, $statement);
if(mysqli_num_rows($result)>0)
{
	while($rows = mysqli_fetch_assoc($result))
	{
		echo "<table style=position:center;width:25cm;>";
		echo "";
		echo "<th>ID</th>";
		echo "<th>Bloodname</th>";
		echo "<th>Availibility</th>";
		echo "<th>unit</th>";
		echo "<th>Hospital</th>";
		echo "</tr>";
		echo "<tr style=position:relative;width:13cm;>";
	  	$ID = $rows ['bloodid'];
		echo "<td>$ID</td>";
		echo "<br>";
		$Bloodname = $rows['Bloodname'];
		echo "<td>$Bloodname</td>";
		echo "<br>";
		$Availibility = $rows['Availibility'];
		echo "<td>$Availibility</td>";
		echo "<br>";
		$unit = $rows['unit'];
		echo "<td>$unit</td>";
		echo "<br>";
		$Hospital= $rows['hospital'];
		echo "<td>$Hospital</td>";
		
		echo "<br>";
		echo "</td>";
		echo "</table>";
	}
}
/*else
{
	echo "No Camps";

}*/

?><br>
						<a href="bloodupdate.php">Go Back</a>
					</center>
						
					
			</ul>
		</div>
	</section>	

</body>
</html>