
<?php
if (isset($_POST['register_btn'])) {
    if (isset($_POST['Bloodname']) && isset($_POST['Availibility']) &&
        isset($_POST['unit']) && isset($_POST['hospital'])) {
        
			$Bloodname = $_POST['Bloodname'];
			$Availibility = $_POST['Availibility'];
			$unit = $_POST['unit'];
			$hospital= $_POST['hospital'];
        $host = "localhost";
        $dbUsername = "antar";
        $dbPassword = "admin";
        $dbName = "blood_bank";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT unit FROM bloodgroup WHERE unit = ? LIMIT 0";
            $Insert = "INSERT INTO bloodgroup(Bloodname, Availibility, unit, hospital) values(?, ?, ?, ?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("i", $unit);
            $stmt->execute();
            $stmt->bind_result($unit);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssis",$Bloodname, $Availibility, $unit, $hospital);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Already registered.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>
<html>
	<p>
	<a href="..\adminhome.php"style="font-size:20px">Back to Home</a>
	</P>
</html>