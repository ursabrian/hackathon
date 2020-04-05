<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cweed Solution</title>

  <!-- Bootstrap core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/grayscale.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="/hackathon/"><font color="Black">Cweed Solution</font></a>
      <!--
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      -->
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <!--
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>


          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#projects">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#signup">Contact</a>
          </li>
        
-->   
        
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header>

  <br><br>
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">Register</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5"></h2>
      
       
      </div>
    </div>
  </header>
    <div class="container">
        <?php
// define variables and set to empty values
$nameErr = $hpErr = $genderErr = $icErr =$pwErr= "";
$name = $hp = $gender = $comment = $ic = $pw= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["hp"])) {
    $hpErr = "Phone Number is required";
  } else {
    $hp= test_input($_POST["hp"]);
  }
    
  if (empty($_POST["ic"])) {
    $icErr = "Identification Card Number is required";
    
  } else {
    $ic = test_input($_POST["ic"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["pw"])) {
    $pwErr = "Password Number is required";
  } else {
    $pw = test_input($_POST["pw"]);
  }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<style>
.error {color: #FF0000;}

.container1 {
  width: 500px;
  clear: both;
}

.container1 input {
  width: 100%;
  clear: both;
}
</style>






<table bgcolor="#ffffff" align="center">

<form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<tr>
<td></td><td><h2>User Registration Form</h2></td>
    <td><p><span class="error">* Required field</span></p></td>
    
  </tr>
  <tr><td><br></td><td></td><td></td></tr> 
  <tr>
    <td>Name:</td>
    <td><input type="text" name="name" size=40></td>
    <td><span class="error">* <?php echo $nameErr;?></span></td>
  </tr>
  <tr><td><br></td><td></td><td></td></tr>   <tr>
    <td>Password:</td>
    <td><input type="Password" name="pw" size=40></td>
    <td><span class="error">* <?php echo $pwErr;?></span></td>
  </tr>
  <tr><td><br></td><td></td><td></td></tr> 
  <tr>
    <td>Phone Number:</td>
    <td><input type="text" name="hp" size=40></td>
    <td><span class="error">* <?php echo $hpErr;?></span></td>
  </tr>
  <tr><td><br></td><td></td><td></td></tr> 
  <tr>
    <td>IC:</td>
    <td> <input type="text" name="ic" size=40></td>
    <td><span class="error">* <?php echo $icErr;?></span></td>
  </tr>
  <tr><td><br></td><td></td><td></td></tr> 
  <tr>
    <td>Address:</td>
    <td>  <textarea name="comment" rows="5" cols="40"  ></textarea></td>
    <td></td>
  </tr>
  <tr><td><br></td><td></td><td></td></tr> 


  

  
  <tr><td><br></td><td></td><td></td></tr>    <tr><td><br></td><td></td><td></td></tr> <tr><td><br></td><td></td><td></td></tr> 


  <tr>
  <td></td><td align="center"><input type="submit" name="submit" value="Submit" class="btn btn-primary js-scroll-trigger" ></td><td></td>
</tr>
  </form>
</table>
<br><br> <br><br>



<?php
$servername = "Cweedchow.ddns.net";
$username = "admin";
$password = "admin";
$dbname = "hackathon";
$check = false;



if($ic==""){
  $check = true;

}

if($name==""){
  $check = true;
}

if($comment==""){
  $check = true;

}

if($hp==""){
  $check = true;
}
if($pw==""){
  $check = true;
}

if($check==false){
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user (`IC`, `Name`, `Address`, `Phone Number`,`password`)
VALUES ('".$ic."','".$name."', '".$comment."','".$hp."','".$pw."')";

if ($conn->query($sql) === TRUE) {
   
    echo '<script>alert("Register Success")</script>';
    echo '<script>window.location.href = "http://cweedchow.ddns.net/hackathon/choice/enduserform"</script>';
    ;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

//header("Location: /hackathon/choice/enduserform");
}else{
//echo "Fail";
}
?>

</div>
      </div>
     <!--   <a href="#about" class="btn btn-primary js-scroll-trigger">Login</a>
        <a href="#about" class="btn btn-primary js-scroll-trigger">Register</a>
-->
       


  
  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50">
    <div class="container">
      Copyright &copy; Your Website 2019
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../../js/grayscale.min.js"></script>

</body>

</html>
