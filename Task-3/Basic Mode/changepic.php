<!DOCTYPE html>
<html>

<head>
    <title> Upload Profile Pic
    </title>
    <link rel="stylesheet" type="text/css" href="profpic.css">
    <link href='https://fonts.googleapis.com/css?family=Exo' rel='stylesheet' type='text/css'>
</head>
<?php
session_start();
$Password = $_SESSION['password'];
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
			$sql = "UPDATE users SET image = '$ImageName' WHERE password = '$Password' AND email = '$Email' ";
			mysqli_query($con, $sql);
			header('location:profile.php');
			}
		}
	} ?>

<body>
    <h1 style="color:white;text-align:left;margin-left:15px;background-color:crimson;padding:15px">DeltaConnect
    </h1>
    <br />
    <div class="options" style="float:right;font-size:5px;padding:2px;margin-right:80px">
        <br />
        <form action="edit.php">
            <button>EDIT INFO
            </button>
        </form>
        <br />
        <br />
        <br />
        <form action="changepic.php">
            <button>CHANGE PROFILE PIC
            </button>
        </form>
        <br />
        <br />
        <br />
        <form action="profile.php">
            <button>MY PROFILE
            </button>
        </form>
        <br />
        <br />
        <br />
        <form action="homepg.html">
            <button>LOG OUT
            </button>
        </form>
    </div>
    <div id="signin" style="float:right;margin-right:150px;width:560px">
        <h2> Update Your Profile Pic !
      </h2>
        <?php $image = $_SESSION['image']; ?>
        <img src="<?php echo " Upload/ " . "$image "; ?>" style="border-radius:5px">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="propic" required/>
            <button type="submit" value="submit" style="background:crimson;background-hover:green"> UPDATE
            </button>
        </form>
    </div>

    <h4 style="color:white;background:black;font-family:'exo',sans-serif;text-align:center;margin-top:498px">&copy; DeltaConnect | All rights reserved</h4>
</body>

</html>