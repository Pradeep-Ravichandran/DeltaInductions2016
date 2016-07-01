<?php
session_start();
$Email="";
$Password=$image="";
$con = mysqli_connect('localhost','root','','delta');
if(!$con)
{
die('Error Connecting DataBase');
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
$Email = $_POST['LoginEmail'];
$Password = md5($_POST['LoginPassword']);
$userexist=false;
$myEmail="";
$_SESSION['email']=$Email;
$_SESSION['password']=$Password;
$sql = "SELECT * FROM users where email='$Email' AND password='$Password' ";
$result = mysqli_query($con,$sql);
$count = mysqli_num_rows($result); //no of matched records
if($count==1)
{$_SESSION['userexist']=true;
$_SESSION['email']=$Email;}
}
if($_SESSION['userexist']==true){
$myEmail=$_SESSION['email'];
$sql2 = "SELECT * FROM users where email='$myEmail' ";
$result2 = mysqli_query($con,$sql2);  
$row = mysqli_fetch_array($result2,MYSQLI_ASSOC);
$image = $row['image'];
}
$dir = "Upload/";   // Profile pics upload directory
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      <?php echo $row['username']; ?>
    </title>
    <link rel="stylesheet" type="text/css" href="profile.css">
    <link href='https://fonts.googleapis.com/css?family=Exo' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <h1 style="color:white;text-align:left;margin-left:15px;background-color:crimson;padding:15px" >DeltaConnect
    </h1>
    <h2 style="text-align:center;color:white;margin:0px">Welcome to your profile 
      <?php echo $row['username']; ?> !
    </h2>
    <div id="image"> 
      <img style="margin-left:30px;margin:30px" src="<?php echo "$dir"."$image" ; ?>">  
      <br>
      <br>
      <br>
      <h1 style="color:white;text-align:center;margin-right:12px"> 
        <?php echo $row['username']; ?>
      </h1>
    </div>
    <div id="options" style="float:right">
      <br>
      <form action="edit.php">
        <button>EDIT INFO
        </button>
      </form>
      <br>
      <br>
      <form action="changepic.php">
        <button>CHANGE PROFILE PIC
        </button>
      </form>
      <br>
      <br>
      <form action="profile.php">
        <button>MY PROFILE
        </button>
      </form>
      <br>
      <br>
      <form action="homepg.html">
        <button>LOG OUT
        </button>
      </form>
    </div>
    <div id="details">
      <br>
      <h3>
        <span style="color:black;margin-left:107px"> FIRST 
          <span style="margin:10px">NAME
          </span>: 
        </span>
        <?php echo $row['fname']; ?>
      </h3>
      <h3>
        <span style="color:black;margin-left:107px"> LAST 
          <span style="margin:10px"> NAME
          </span>: 
        </span>
        <?php echo $row['lname']; ?>
      </h3> 
      <h3>
        <span style="color:black;margin-left:107px"> USER 
          <span style="margin:10px"> NAME
          </span>: 
        </span>
        <?php echo $row['username']; ?>
      </h3> 
      <h3>
        <span style="color:black;margin-left:107px"> EMAIL 
          <span style="margin:10px"> ID
          </span>: 
        </span>
        <?php echo $row['email']; ?>
      </h3> 
      <h3>
        <span style="color:black;margin-left:107px"> HOME
          <span style="margin:10px"> TOWN
          </span>: 
        </span>
        <?php echo $row['hometown']; ?>
      </h3> 
      <h3>
        <span style="color:black;margin-left:107px"> GENDER : 
        </span>
        <?php echo $row['gender']; ?>
      </h3> 
      <h3>
        <span style="color:black;margin-left:107px"> PHONE 
          <span style="margin:10px"> NO.
          </span>: 
        </span>
        <?php echo $row['phoneno']; ?>
      </h3> 
    </div>
  </body>
</html>
