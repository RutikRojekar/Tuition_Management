<!DOCKTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <title>login form</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <?php
  session_start();
// define variables and set to empty values
$Usern=$type= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["Usern"])) {
    $Stu_nErr = "Name is required";
  } else {
    $Usern = test_input($_POST["Usern"]);

  }
  
  if (empty($_POST["type"])) {
    $Phon_Err = "Phone Number is required";
  } else {
    $type = test_input($_POST["type"]);
    
  }
  
}

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>

     <form class="box" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
     <h1>login</h1>
     <input type="text" name="Usern" placeholder="Username">
     <input type="password" name="type" placeholder="Password">
     <input type="submit" name="submit" value="Log in" href="https://www.wikipedia.org">
     <br><br>
     <button><a href="signup.html">Sign up</a></button> 
    
     </form>

  
 
<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$Sub_id=$last_pay="";


 function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
    }
    if(isset($_POST['submit']))
   { try {
    $conn = new PDO("mysql:host=$servername;dbname=tm2", $username, $password);
  // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "select password from userinfo where username='$Usern'";
  

    $pass=0;
  $obj=$conn->prepare($sql);
  $obj->execute();
  $pass=$obj->fetchColumn();

  if($type==$pass)
  {  echo "<script> location.href='home.html'; </script>";
        exit();
   #redirect('home.html');
  }
  else
  {
    echo"Wrong Password";
  }

    
  
 

  } catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  }

    
   }
  
?>
    
   </body>
    
    </html> 

