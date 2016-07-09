<!DOCTYPE html>
<html>

<head>
    <title> LOG IN
    </title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link href='https://fonts.googleapis.com/css?family=Exo' rel='stylesheet' type='text/css'>
</head>

<body>
    <?php session_start(); ?>
    <h1 style="color:white;text-align:left;margin-left:15px;background-color:crimson;padding:15px">DeltaConnect
    </h1>
    <div id="login">
        <h1 style="background:teal;width:150;color:white">LOG - IN
        </h2>
      <form action="profile.php" method="post">
        <div id="error"> <?php

if (!empty($_SESSION['loginerr']))
	{
	echo $_SESSION['loginerr'];
	} ?></div>
        <?php unset($_SESSION['loginerr']); ?>
        <input type="email" name="LoginEmail" placeholder="Email" required />
        <br />
        <input type="password" name="LoginPassword" placeholder="Password" minlength=6 required />
        <br />
        <button type="submit" value="submit" style="background:crimson">LOG IN
        </button>
      </form>
    </div>  
    
     <h4 style="color:white;background:black;font-family:'exo',sans-serif;text-align:center;margin-top:74px">&copy; DeltaConnect | All rights reserved</h4>
  </body>
</html>