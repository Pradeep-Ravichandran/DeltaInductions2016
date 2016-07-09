    !DOCTYPE>
    <html>
      <head>
        <title> SIGN UP 
        </title>
        <link rel="stylesheet" type="text/css"  href="register.css"  >
        <link href='https://fonts.googleapis.com/css?family=Exo' rel='stylesheet' type='text/css'>
      </head>
      <body>
        <?php
    session_start();
    $fname = $lname = $username = $email = $password = $re_password = $gender = $hometown = $phoneno = $usererror = $passerror = $emailerror = "";
    $flag = 0;
    $con = mysqli_connect("localhost", "root", "", "Delta");

    if (!$con)
        {
        die('Error Connecting DataBase - ' . mysqli_connect_error());
        }

    function validation($data)
        {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
        $fname = validation($_POST['fname']);
        $lname = validation($_POST['lname']);
        $username = validation($_POST['username']);
        $sqluser = "SELECT * FROM users WHERE username='$username'";
        $resultuser = mysqli_query($con, $sqluser);
        $checkuser = mysqli_num_rows($resultuser);
        if ($checkuser > 0)
            {
            $usererror = "UserName already taken!";
            $flag = 1;
            }

        $email = validation($_POST['email']);
        $sqlemail = "SELECT * FROM users WHERE email='$email'";
        $resultemail = mysqli_query($con, $sqlemail);
        $checkemail = mysqli_num_rows($resultemail);
        if ($checkemail > 0)
            {
            $emailerror = "Email already registered!";
            $flag = 1;
            }

        $password = md5(validation($_POST['password']));
        $hometown = validation($_POST['hometown']);
        $gender = validation($_POST['gender']);
        $phoneno = $_POST['phoneno'];
        $re_password = md5(validation($_POST['re_password']));
        if ($password != $re_password)
            {
            $passerror = "Passwords doesnt match";
            $flag = 1;
            }

        $Image = "";
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        if ($flag == 0)
            {
            if ($con)
                {
                $sqlemail = "SELECT * FROM users where email='$email";
                $sql = "INSERT INTO users VALUES('$fname','$lname','$username','$email','$password','$hometown','$gender','$phoneno','$Image')";
                $test = mysqli_query($con, $sql);
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                header('location:profpic.php');
                }
            }
        }

    ?>
        <h1 style="color:white;text-align:left;background-color:crimson;padding:15px;font-family:'exo',sans-serif" >DeltaConnect
        </h1>
        <div id="signin">
          <br />
          <br />
          <div style="text-align:center">
            <span style="color:white;font-family:'exo',sans-serif;border-radius:2px;background:teal;text-align:center;padding:5px;font-size:30px">Create Your Account
            </span>
          </div>
          <form action="" method = "post" >
            <input type="text" name="fname" placeholder="First Name" value="<?php echo $fname; ?>" required/>
            <input type="text" name="lname" placeholder="Last Name" value="<?php  echo $lname; ?>" required/>
            <br />
            <div id="error">
              <?php echo $usererror; ?>
            </div>
            <br />
            <input type="text" name="username" placeholder="User Name" style="margin-top:0px" value="<?php echo $username; ?>"  required/>
            <br />
            <div id="error">
              <?php echo $emailerror; ?>
            </div>
            <br />
            <input type="email" name="email" placeholder="Email Id" style="margin-top:0px" required />
            <br />
            <div id="error">
              <?php echo $passerror; ?>
            </div>
            <br />
            <input type="password" name="password" minlength="6" style="margin-top:0px" placeholder="Password"  required/>
            <input type="password" name="re_password" minlength="6" placeholder="Retype Password"  required/>
            <input type="text" name="hometown"  placeholder="Hometown"  value="<?php echo $hometown; ?>"required/>
            <input type="text" name="gender" value="<?php echo $gender ?>" placeholder="Gender (Male/Female)" pattern="Male|Female" required/>
            <input type="number" name="phoneno" minlength="10" placeholder="Phone No." value="<?php echo $phoneno; ?>" required/>
            <br />
            <button type="submit" name="submit">SIGN UP
            </button>
          </form>
        </div>
         <h4 style="color:white;background:black;font-family:'exo',sans-serif;text-align:center">&copy; DeltaConnect | All rights reserved</h4>
      </body>
    </html>
