<?php
session_start();
$UserName = $_SESSION['username'];
$Email = $_SESSION['email'];

if (isset($_FILES['propic']))
	{
	$ImageName = $_FILES['propic']['name'];
	$ImageTemp = $_FILES['propic']['tmp_name'];
	$ImageType = $_FILES['propic']['type'];
	$ImageSize = $_FILES['propic']['size'];
	if (!$ImageTemp)
		{
		die('Please Select an Image');
		}
	  else
		{
		move_uploaded_file($ImageTemp, "Upload/$ImageName");
		$con = mysqli_connect('localhost', 'root', '', 'delta');
		if (!$con)
			{
			die('Error Connecting Database');
			}
		  else
			{
			$_SESSION['image'] = $ImageName;
			$sql = "UPDATE users SET image = '$ImageName' WHERE username = '$UserName' AND email = '$Email' ";
			mysqli_query($con, $sql);
			}
		}
	} ?>
<!DOCTYPE html>
<html>

<head>
    <title> LOG IN
    </title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link href='https://fonts.googleapis.com/css?family=Exo' rel='stylesheet' type='text/css'>
</head>

<body>

    <h1 style="color:white;text-align:left;margin-left:15px;background-color:crimson;padding:15px">DeltaConnect
    </h1>
    <div id="login">
        <h1> Hey 
        <?php echo $UserName; ?>!
      </h1>
        <h2> Your account has been created successfully!
      </h2>
        <h2> Log In To Continue... 
      
      <form action="profile.php" method="post">
        <div id="error"> 
        <?php
    if (!empty($_SESSION['loginerr']))
	{
	echo $_SESSION['loginerr'];
	} ?>
       </div>
        <?php unset($_SESSION['loginerr']); ?>
        <input type="email" name="LoginEmail" placeholder="Email" required />
        <br />
        <input type="password" name="LoginPassword" placeholder="Password" required />
        <br />
        <button type="submit" value="submit">LOG IN
        </button>
      </form>
          </div>
           <h4 style="color:white;background:black;font-family:'exo',sans-serif;text-align:center">&copy; DeltaConnect | All rights reserved</h4>
  </body>
    </html>