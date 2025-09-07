<html>
   <head>
      <title>PHP WEBDESIGN PROJECT</title>
	  <link rel="stylesheet" type="text/css" href="style.css">
   </head>
   <Body>
      <div id="header">
	     <div id="logotxt">
	        <h1>RAMYA PROJECT</h1>
	     </div>
		 <div id="logo">
	         <img src="logo.webp"id="imdlogo">
	     </div>
		 
	  </div>
      <div id="nav">
	   <center>
	   <ul id="navul">
	      <li><a href="index.php">Home</a></li>
		  <li><a href="product.php">product</a></li>
		  <li><a href="About.php">About Us</a></li>
		  <li><a href="contact.php">Contact Us</a></li>
		  <li><a href="downloads.php">Downloads</a></li>
		</ul>
		</center>
	  </div>
	  <div id="container">
	     <center>
	    <h1>SignIn</h1>
		</center>
		<fieldset id="user-login">
  <legend>User Id</legend>
  <form action="signin.php" method="post">
    <table id="user-table">
      <tr>
        <td>User Name</td>
        <td><input type="text" name="username" required></td>
      </tr>
      <tr>
        <td>User Password</td>
        <td><input type="password" name="password" required></td>
      </tr>
      <tr>
        <td><input type="submit" id="sbtn" name="login" value="Login"></td>
        <td><input type="reset" id="clear" value="Reset"></td>
      </tr>
      <tr>
        <td><a href="#">Forget password</a></td>
        <td><a href="signup.php">New User Registration</a></td>
      </tr>
    </table>
  </form>	  
</fieldset>
    <?php
include("config.php"); 

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE name='$username' LIMIT 1";
    $result = $con->query($sql);

    if($result && $result->num_rows > 0){
        $row = $result->fetch_assoc();
        if($password === $row['password']){
            echo "<p class='correct'>Login successful! Welcome, $username</p>";
            
        }
        else{
            echo "<p class='error'>Invalid password</p>";
        }
    } else {
        echo "<p class='error'>No user found with that username</p>";
    }
}
?>	  </div>
	  <div id="footer"></div>
   </body>
</html>