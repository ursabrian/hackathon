
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
      <a class="navbar-brand js-scroll-trigger" href="/hackathon/">Cweed Solution</a>
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
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
         
              
        <h1 class="mx-auto my-0 text-uppercase">Login</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5"></h2>
    


        <?php
// define variables and set to empty values
$icErr =$pwErr= "";
 $ic = $pw= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["ic"])) {
    $icErr = "*Identification Card Number is required";
    
  } else {
    $ic = test_input($_POST["ic"]);
  }


  if (empty($_POST["pw"])) {
    $pwErr = "*Password Number is required";
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



  <br>  <br>  
  <table>
  <form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <tr>
        <td style="color:white";>IC:</td><td><input type="Text" name="ic" value="<?php echo $ic;?>"></input></td>
    </tr>

    <tr>
        <td style="color:white">Password:</td><td><input type="Password" name="pw"  value="<?php echo $pw;?>"></input></td>
    </tr>

<tr><td><br></td></tr>
    <tr>
  <td></td><td align="center"><input type="submit" name="Login" value="Login" class="btn btn-primary js-scroll-trigger" ></td>
</tr>
</form>

</table>








<?php
$servername = "Cweedchow.ddns.net";
$username = "admin";
$password = "admin";
$dbname = "hackathon";
$check = false;



if($ic==""){
  $check = true;

}

if($pw==""){
  $check = true;
}

if($check==false){
// Create connection


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `user`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["ID"]. " - Name: " . $row["IC"]. " " . $row["Name"]. "<br>";
       if( $ic==$row["IC"]){
        
        if( $pw==$row["Password"]){

          session_start();


          $_SESSION['ic'] = $ic;
          header("Location: /hackathon/choice/EndUserForm/Profile.php");
        
        }else{
          Echo "Wrong Password";
        }

     }else{
        Echo "NO IC Exist";
     }

       }
    }


mysqli_close($conn);


}else{
//echo "Fail";
}
?>













      </div>
    </div>
  </header>

  
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
