<!DOCTYPE>
<html>
  <head>
    <title> Edit Info 
    </title>
    <link rel="stylesheet" type="text/css"  href="register.css"  >
    <link href='https://fonts.googleapis.com/css?family=Exo' rel='stylesheet' type='text/css'>
  </head>
  <?php session_start();
$Email="";
$Password="";
$con = mysqli_connect('localhost','root','','delta');
if(!$con)
{
die('Error Connecting DataBase');
}
if($_SESSION['userexist']==true){
$myEmail=$_SESSION['email'];
$sql2 = "SELECT * FROM users where email='$myEmail' ";
$result2 = mysqli_query($con,$sql2);  
$row = mysqli_fetch_array($result2,MYSQLI_ASSOC);
}
function validate($data) {
$data=trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
$fname= validate($_POST['fname']);
$lname=validate($_POST['lname']);
$hometown=validate($_POST['hometown']);
$gender=validate($_POST['gender']);
$phoneno=$_POST['phoneno'];
$sqlfname = "UPDATE users SET fname ='$fname' WHERE email='$myEmail'";
mysqli_query($con,$sqlfname);
$sqllname = "UPDATE users SET lname ='$lname' WHERE email='$myEmail'";
mysqli_query($con,$sqllname);
$sqlhometown = "UPDATE users SET hometown ='$hometown' WHERE email='$myEmail'";
mysqli_query($con,$sqlhometown);
$sqlgender = "UPDATE users SET gender ='$gender' WHERE email='$myEmail'";
mysqli_query($con,$sqlgender);
$sqlphoneno = "UPDATE users SET phoneno ='$phoneno' WHERE email='$myEmail'";
mysqli_query($con,$sqlphoneno);
header('location:profile.php');
}
?>
  <body>
    <h1 style="color:white;text-align:left;background-color:crimson;padding:15px;font-family:'exo',sans-serif" >DeltaConnect
    </h1>
    <div class="options" style="float:right;font-size:5px;padding:2px;margin-right:60px" >
      <br>
      <form action="edit.php">
        <button style="background:teal">EDIT INFO
        </button>
      </form>
      <br>
      <br>
      <br>
      <form action="changepic.php">
        <button style="background:teal">CHANGE PROFILE PIC
        </button>
      </form>
      <br>
      <br>
      <br>
      <form action="profile.php">
        <button style="background:teal">MY PROFILE
        </button>
      </form>
      <br>
      <br>
      <br>
      <form action="homepg.html">
        <button style="background:teal">LOG OUT
        </button>
      </form>
    </div>
    <div id="signin" style="margin-left:300px">
      <br>
      <br>
      <div style="text-align:center">
        <span style="color:white;font-family:'exo',sans-serif;border-radius:2px;background:teal;text-align:center;padding:10px;font-size:30px">Edit Info
        </span>
      </div>
      <form action="" method = "post" >
        <span>First Name :
        </span>
        <br>
        <input type="text" name="fname" placeholder="First Name" value="<?php echo $row['fname']; ?>" required/>
        <br>
        <span>Last Name :
        </span>
        <br>
        <input type="text" name="lname" placeholder="Last Name" value="<?php echo $row['lname']; ?>" required/>
        <br>
        <span> Hometown :
        </span>
        <br>
        <input type="text" name="hometown"  placeholder="Hometown"  value="<?php echo $row['hometown']; ?>" required/>
        <br>
        <span>Gender :
        </span>
        <br>
        <input type="text" name="gender" value="<?php echo $row['gender']; ?>" placeholder="Gender (Male/Female)" pattern="Male|Female" required/>
        <br>
        <span>Phone No :
        </span>
        <br>
        <input type="number" name="phoneno" minlength="10" placeholder="Phone No." value="<?php echo $row['phoneno']; ?>"required/>
        <br>
        <button type="submit" name="submit" style="font-size:20px">UPDATE INFO
        </button>
      </form>
    </div>
  </body>
</html>
