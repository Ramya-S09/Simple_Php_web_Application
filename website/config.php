<?php
 $con=new mysqli("localhost","root","","website");
 if($con->connect_error){
	 echo $con->connect_error;
	 die("sorry database connected failed");
 }
 ?>