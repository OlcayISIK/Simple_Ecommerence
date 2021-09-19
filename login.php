<?php
session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', 'E45pg876123', 'users');
// REGISTER USER
if (isset($_POST['register'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $conpassword = mysqli_real_escape_string($db, $_POST['conpassword']);
  $user_check_query = "SELECT * FROM users WHERE  email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
    if ($password != $conpassword) { 
        echo "<script type='text/javascript'>alert('Passwords Did not Match');</script>";
  }else if ($user) { // if user exists
    if ($user['email'] == $email) {
     echo "<script type='text/javascript'>alert('E-mail already exist');</script>";
    }
  }
  else{
  	$query = "INSERT INTO users (firstname, email, password) VALUES('$firstname', '$email', '$password')";
  	mysqli_query($db, $query);
  	header('location: login.php');
  }
}
    if (isset($_POST['loginbutton'])) {
  $loginname = mysqli_real_escape_string($db, $_POST['loginname']);
  $loginpassword = mysqli_real_escape_string($db, $_POST['loginpassword']);

  	$query = "SELECT * FROM users WHERE firstname='$loginname' AND password='$loginpassword'";
    $results = mysqli_query($db, $query);
    $count = mysqli_num_rows($results);
    if($count > 0){
      while($row = mysqli_fetch_array($results))
      {
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
      }
    }
  	if (mysqli_num_rows($results) == 1) {
      $_SESSION['loginname'] = $loginname;
  	  header('location: index.php');
  	}else {
        echo "<script type='text/javascript'>alert('Wrong Name Or Password');</script>";
  	}
}

?>
<html>
    <head>
        <title> Login Page</title>
       <link rel="stylesheet" type="text/css" href="login.css">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous"> 
    </head>

    <body>
        <div class="loginpage" id="logpage">
            <div class="loginform" id="inputform">
                <div class="buttonbox">
                    <div id="button"></div>
                    <button type="button" class="togglebutton" onclick="signin()">Sign-In</button>
                    <button type="button" class="togglebutton" onclick="signup()">Sign-Up</button>
                </div>
                <form id="form_id" action="login.php" method="POST">
                        <table id="login" class="logininputgroup"> 
                    <tbody>   
                     <th> <img src="booklogin.jpg" class="picture"> </th>
                        <tr>
                            <td>
                                <input type="text" class="inputfield" name="loginname" id="loginname" placeholder="Your Name" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" class="inputfield" name="loginpassword" id="loginpassword" placeholder="Password" required>
                            </td>
                        </tr>
                   
                        <tr>
                      <td colspan="2"><input type="submit" class="loginbtn" name="loginbutton" value="Log-In"></td>
                    </tr>
                </tbody>
                </table>
              </form>
              <form id="form_id" action="login.php" method="POST">
                <table id="register" class="logininputgroup">
                    <tbody>
                      <th> <img src="booksignup.jpg" class="picture"> </th>
                    <tr>
                      <td><input type="text" class="inputfield" name="firstname" id="first" placeholder="Firstname" required ></td>
                    </tr>
                    <tr>
                      <td><input type="text" class="inputfield" name="email" id="email" placeholder="E-mail" required ></td>
                    </tr>
                    <tr>
                      <td><input type="password" class="inputfield" name="password" id="password" placeholder="Password" required></td>
                    </tr>
                    <tr>
                      <td><input type="password" class="inputfield" name="conpassword" id="confirm" placeholder="Confirm Password" required ></td>
                    </tr>
                    <tr>
                      <td colspan="2"><input type="submit" class="loginbtn" name="register" id="create"  value="Register"></td>
                    </tr>
                  </tbody></table>
                </form>
            </div>
        </div>
        <script src="login.js"></script> 
        <script src="jquery.js"></script>
    </body>
</html>

