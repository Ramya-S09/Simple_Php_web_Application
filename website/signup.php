<?php
  include("config.php");
 ?>

<!doctype html>
<html>
<head>
   <title>PHP WEBDESIGN PROJECT</title>
   <link rel="stylesheet" type="text/css" href="style.css">
   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
   <script>
      $(document).ready(function(){
         $("#p2").bind("blur", password_check);
      });

      function password_check(){
         var p1 = $("#p1").val();
         var p2 = $("#p2").val();
         if(p1 != p2){
            $("#pass_err").html(" Mismatch password").css("color","red");
         } else {
            $("#pass_crt").html(" Password correct").css("color","green");
         }
      }
   </script>
</head>
<body>
   <div id="header">
      <div id="logotxt">
         <h1>RAMYA PROJECT</h1>
      </div>
      <div id="logo">
         <img src="logo.webp" id="imdlogo">
      </div>
   </div>

   <div id="nav">
      <center>
      <ul id="navul">
         <li><a href="index.php">Home</a></li>
         <li><a href="product.php">Product</a></li>
         <li><a href="about.php">About Us</a></li>
         <li><a href="contact.php">Contact Us</a></li>
         <li><a href="downloads.php">Downloads</a></li>
      </ul>
      </center>
   </div>

   <div id="container">
      <center>
         <h1>New User Registration</h1>
      </center>
      <fieldset id="user-login">
         <legend>User Id</legend>
         <form action="signup.php" method="post" autocomplete="off">
            <table id="user-table">
               <tr>
                  <td>User Name</td>
                  <td><input type="text" name="username" required></td>
               </tr>
               <tr>
                  <td>User Email</td>
                  <td><input type="text" name="email" required></td>
               </tr>
               <tr>
                  <td>User Password</td>
                  <td><input type="password" name="pass1" id="p1" required></td>
                  <td>
                     <i id="pass_err" class="error"></i>
                     <i id="pass_crt" class="correct"></i>
                  </td>
               </tr>
               <tr>
                  <td>Confirm Password</td>
                  <td><input type="password" name="pass2" id="p2" required></td>
               </tr>
               <tr>
                  <td>Security Question</td>
                  <td>
                     <select name="security_question" required>
                        <option value="">--Select--</option>
                        <option value="What is your favourite pet?">What is your favourite pet?</option>
                        <option value="What is your favourite color?">What is your favourite color?</option>
                     </select>
                  </td>
               </tr>
			   <tr>
                  <td>Selected Answer</td>
                  <td><input type="text" name="ans" id="ans1" required></td>
               </tr>
               <tr>
                  <td><input type="submit" id="sbtn" name="submit" value="Save"></td>
                  <td><input type="reset" id="clear" value="Reset"></td>
               </tr>
               <tr>
                  <td><a href="signin.php">Already User</a></td>
                  <td><a href="signup.php">New User Registration</a></td>
               </tr>
            </table>
         </form>
      </fieldset>
	  <?php
   if(isset($_POST['submit']))
   {
      $name  = $_POST["username"];
      $email = $_POST["email"];
      $pass1 = $_POST["pass1"];
      $pass2 = $_POST["pass2"];
      $ques  = $_POST["security_question"];
      $ans   = $_POST["ans"]; 

      if($name!="" && $email!="" && $pass1!="" && $pass2!="" && $ques!="" && $ans!=""){
         if($pass1 == $pass2){
            $sql="INSERT INTO users(name,email,password,question,answer)
                  VALUES('$name','$email','$pass1','$ques','$ans')";
            if($con->query($sql)){
               echo "<p class='correct'>User registered successfully</p>";
            }
            else{
               echo "<p class='error'>Some error, try again later</p>";
            }
         }
         else{
            echo "<p class='error'>Password and confirm password must be same</p>";
         }   
      }
      else{
         echo "<p class='error'>Please fill all the form</p>";
      }
   }
?>

   </div>

   <div id="footer">
   </div>
</body>
</html>
