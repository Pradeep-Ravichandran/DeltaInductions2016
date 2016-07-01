<!DOCTYPE html>
<html>
  <head>
    <title> Upload Profile Pic 
    </title>
    <link rel="stylesheet" type="text/css" href="profpic.css">
    <link href='https://fonts.googleapis.com/css?family=Exo' rel='stylesheet' type='text/css'>
  </head>
  <body>   
    <h1 style="color:white;text-align:left;margin-left:15px;background-color:crimson;padding:15px" >DeltaConnect
    </h1>
    <div id="signin" style="margin:auto">
      <br>
      <h3> Hey !...you are 1 step away from signing up! 
      </h3> 
      <h3> Update Your Profile Pic !
      </h3> 
      <img src="propic.jpeg">
      <form action="login1.php" method="post" enctype="multipart/form-data">
        <input type="file" name="propic" required/>
        <button type="submit" value="submit"> NEXT 
        </button>
      </form>
    </div>
  </body>
</html>
