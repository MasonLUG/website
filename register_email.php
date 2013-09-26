<!DOCTYPE html>
<html>
  <head>
    <link href="http://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" media="screen"> <!-- what does media="screen" mean? -->

    <title>MasonLUG</title>
  </head>
  <body>
    <div id="header">
      <div id="banner">
	<a href="index.html">
	  <img src="/img/gmuluglogo.png"/>
	</a>
      </div>
      <ul id="navbar">
	<li><a href="/index.html">Home</a></li>
	<li><a href="/about.html">About</a></li>
      </ul>
    </div>
    <div id="content">
      <?php
	 if ($_POST["email"] == null) {
	 ?>
      <p>You didn't submit an email! <a href="index.html">Try again.</a></p>
      <?php
	 } else {
	 $con=mysqli_connect("localhost", "gmulugdb_user", "gmulugdb_password", "gmulugdb");
	 if (mysqli_connect_errno($con)) {
	   echo "failed to connect to mysql";
	 }
	 
	 if (strpbrk($_POST["user"], ";") == FALSE && strpbrk($_POST["email"], ";") == FALSE) {
	   mysqli_query($con, "INSERT INTO emails (name, email) VALUES ('" . mysqli_real_escape_string($con, $_POST["user"]) . "', '" . mysqli_real_escape_string($con, $_POST["email"]) . "')");
	 }
	 ?>
      <p>Thanks for your interest! I'll be contacting you shortly. This is all being done manually while I set up <a href="http://en.wikipedia.org/wiki/GNU_Mailman">Mailman</a> and figure out how to use George Mason's stmp servers to send outgoing email.</p>
      <?php
	 }
	 ?>
    </div>
    <div id="footer">
      <p>Copyright &copy 2013 The George Mason University GNU/Linux User Group. Updated 9/18/2013. <a rel="license" href="http://creativecommons.org/licenses/by-nd/3.0/us/">Some rights reserved.</a></span></p>
    </div>      
  </body>
</html>
