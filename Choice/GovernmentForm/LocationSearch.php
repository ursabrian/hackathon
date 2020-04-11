




<!DOCTYPE html>
<html>
<title>Location Search</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}



/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>

<?
session_start();
$un =$_SESSION['username'] ;
$lv =$_SESSION['Level'] ;

if ($un==null){

}
?>


<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"><a  href="index.php">Log Out</a></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
    <img src="../../img/Gov_logo.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome<strong></strong></span><br>

    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="./Dashboard.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="./Peoplesearch.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  People Search</a>
   
    <a href="./locationsearch.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Location Search</a>
  <!--  <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
-->
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>






        <?php


$confirmAdd=$cname=$chp=$cstate=$cbc=$ccity="";


try{
  $parameter = filter_input(INPUT_GET,'url', FILTER_SANITIZE_URL);
  } catch(Exception $e) {
  
  }
  $parameter= base64_decode($parameter);

//echo"<script>alert('". base64_decode($parameter)."')</script>";


if($parameter!=null){
  $name=$parameter;
  }
  






// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
}
if($parameter!=null){
  $name=$parameter;
  }
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
Search Location: <input class="w3-input" type="text" name="name">

<input type="submit" name="submit" value="Submit" class="w3-button w3-blue">  
</form>
<div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5>Regions</h5>
        <!-- Google Map -->
<?php 

if($name!=null){

    echo '        <iframe
    id="map"
    width="100%"
height="300"
frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC2vLnVkyDy18klv0NGMF91yEShBB5DxIg   &q='. $name.'" allowfullscreen>
</iframe>';





$tablevalue="";

$servername = "Cweedsolution.ddns.net";
$username = "admin";
$password = "XLjFk9GyelOgLB6W";
$dbname = "hackathon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `auth` WHERE `Address` like '%".$name."%' OR `Name` like '%".$name."%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
   //echo "Row:   ".$result->num_rows." <br>";
   if($result->num_rows==1){
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["Address"]. " - Name: " . $row["Name"]. "<br>";
        $confirmAdd=$row["Address"];
        $cname=$row["Name"];
        $chp=$row["contact"];
        $cstate=$row["state"];
        $ccity=$row["City"];
        $cbc=$row["Business-code"];
        
      }
    }else{
      if($result->num_rows!=0){
      while($row = $result->fetch_assoc()) {
        $tablevalue.='<tr id="'.$row["Address"].'" onclick="getvalue(\''.base64_encode($row["Address"]).'\')"><td>'.$row["Name"].'</td><td>'.$row["Address"].'</td></tr>';
      }
      }
      
    }
    
} else {
    echo "0 results";
}
$conn->close();



}

 ?>

<?php 








?>





      </div>
      <div class="w3-twothird">
        <h5>Details</h5>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td>Name:</i></td>
       
            <td><i><?php if($cname!=null){echo $cname;}?></i></td>
          </tr>
          <tr>
         
            <td>Business-Code</td>
            <td><i><?php if($cname!=null){echo $cbc;} ?></i></td>
          </tr>
          <tr>
           
            <td>Contact</td>
            <td><i><?php if($cname!=null){echo $chp; }?></i></td>
          </tr>
          <tr>
 
            <td>Address</td>
            <td><i><?php if($cname!=null){echo $confirmAdd;} ?></i></td>
          </tr>
          <tr>
         
            <td>State</td>
            <td><i><?php if($cname!=null){echo $cstate;} ?></i></td>
          </tr>
          <tr>

            <td>City</td>
            <td><i> <?php if($cname!=null) {echo $ccity;} ?></i></td>
          </tr>
      
        </table>
      </div>
    </div>
  </div>
  <hr>


  <div class="w3-container">
    <h5>List of People</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
     <?php 
     if($confirmAdd!=null){








   
     $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `checktable` WHERE `address` LIKE '%".$confirmAdd."%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " <tr>
        <td>".$row["ic"]."</td>
        <td>".$row["In_Time"]."</td>
        <td>".$row["out_time"]."</td>
      </tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
     
     
   
}
     ?>
    </table><br>
    <!--button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button-->
  </div>
  <hr>


<!-- The Modal -->
<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h2 id="mhead">Modal Header</h2>
      </header>
      <div class="w3-container">
        <p id="innerBody">Some text..</p>
        <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white"><tr><th></th><th></th></tr><?php if($tablevalue!=null){ echo $tablevalue;  echo "<script> document.getElementById('id01').style.display='block';  </script>";}?></table>
       
      </div>
      <footer class="w3-container w3-teal">
        <p id="mfoot">Modal Footer</p>
      </footer>
    </div>
  </div>
</div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
  
  
  </footer>

  <!-- End page content -->
</div>

























<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");



function getvalue(params){

//alert(params);
window.location.replace('http://cweedsolution.ddns.net/hackathon/choice/GovernmentForm/locationsearch.php?url="'+params+'"');
}


function clicktest(params){
tablex = document.getElementById("innerBody");


alert("test");
tablex.innerHTML="";
document.getElementById('id01').style.display='block';

//var Row = document.getElementById("table"+params);
//var Cells = Row.getElementsByTagName("td");
//alert(Cells[1].innerText)

//mhead.innerText=Cells[0].innerText;
//mfoot.innerText="Total Traffic : "+Cells[2].innerText
}


// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>




















