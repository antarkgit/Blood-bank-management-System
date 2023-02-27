<?php
session_start();
include 'config.php';

// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from requestblood where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}
?>
<!DOCTYPE>
<html>
<head>

<title>Blood Request</title>
       <link rel = "icon" href =  
"images/down.png" 
        type = "image/x-icon"> 
  <style type="text/css">
  body{
     background-color: skyblue;
  }
</style>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body style="background-color: skyblue;">
<p style="text-align:center;font-size:60px;font-family:cursive;color:black;border-radius:0.5px; background-color: blue;color: white;">Blood Bank Management System</p>
 <center><section id="main-content">
    <section class="wrapper">
				<div class="row">     
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All User Details </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Id</th>
                                  <th class="hidden-phone">First Name</th>
                                  <th> Address</th>
                                  <th> Bloodgroup</th>
                                  <th>Contact no.</th>
                                  <th>unit</th>
                                  <th>What date & time </th>
                                  <th> time</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
                              
                              $ret=mysqli_query($con,"select * from requestblood");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['user'];?></td>
                                  <td><?php echo $row['Address'];?></td>
                                  <td><?php echo $row['bloodgroup'];?></td>
                                  <td><?php echo $row['phno'];?></td>
                                  <td><?php echo $row['unit'];?></td> 
                                  <td><?php echo $row['time-for-flood'];?></td>
                                  <td><?php echo $row['time'];?></td>  
                                
                                  
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
		</section>
	</div>
</div>
	<footer class="footer-distributed">
 <center>
 	<br>
 	<br>
 	 <h3 style="color:black;font-size: 20px">Copyright@2022 Blood Bank Management System</h3>
                <a href="home.php"style="color:black;font-size: 20px">Back to home</a>
                <br>
                <br>
 </center>
            
               
               



               

</body>
</html>
