<?php
session_start();

$con= mysqli_connect('localhost', 'root', '');
mysqli_select_db($con,'blood_bank');
$user=$_POST['user'];
$password=$_POST['pass'];
$useremail=$_POST['useremail'];
$bloodgroup=$_POST['bloodgroup'];
$gender=$_POST['gender'];
$s = "select * from login where user= '$user'";
$result = mysqli_query($con, $s);
$num = mysqli_fetch_row($result);
if($num==true)
{
	echo "<script>alert('Username Taken')</script>";
}
 elseif ($user==null && $password==null)
    {
       echo"Please fill all the fields.";
      exit();
   } 
 

else
{
$reg="insert into login (user, pass,useremail,bloodgroup,gender) values ('$user','$password','$useremail','$bloodgroup','$gender')";
mysqli_query($con,$reg);
 echo "<script>alert('Registration successfull Sign in With your Username')</script>";
 header("location:successfull.html");
   exit();
 }
            ?>

<html>

  <head> 
         
         <style>
       body{

    color:white;
    background-image: url("seamless.jpg");
    text-align: center;

    
    }

  h2{

    text-align: center;
    color:blue;
  }
  b{
    text-align:center;
    color: black;
    text-decoration: none;
    background-color: aqua;
  }

</style>
       </head>

      	
      
          <body>
            
                     <br>
          	      <h1 style="color:red;text-align:center;font-size:50px;font-style:italic;text-decoration: underline">THANK YOU</h1>
                          </br>
                          
          	      <p style="color:black; text-align:center;font-style:bold;font-size:30px">
          	     

          	      
</form></div>
<div style="float:center;padding:5px;color:black;font-size:20px">
<p >Registration succesfull. Thank you!</P>
<p id="back"><b><a href="index.php"> Back to Home to log in</a></b></p>
</section>
</div>


          	     
          	    </body>
          	    
          	    </html>
    