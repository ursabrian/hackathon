




<!DOCTYPE html>
<html>
<title>People Search</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
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
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-eye fa-fw"></i>  People Search</a>
    <a href="./locationsearch.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Location Search</a>

  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
  


    <?php
// define variables and set to empty values
$name =$sic=$ic= $address = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sic = test_input($_POST["name"]);


















}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>




<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
Search IC: <input class="w3-input" type="text" name="name">

<input class="w3-btn w3-blue-grey" type="submit" name="submit" value="Search" class="w3-button w3-blue">  
  </header>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5>Details</h5>


</form>
<?php

try{
$parameter = filter_input(INPUT_GET,'url', FILTER_SANITIZE_URL);
} catch(Exception $e) {

}
//echo "<script> alert(".$parameter.")</script>";
if($parameter!=null){
$sic=$ic=$parameter;
}

if($sic!=null){



$servername = "Cweedsolution.ddns.net";
$username = "admin";
$password = "XLjFk9GyelOgLB6W";
$dbname = "hackathon";



$name =$hp ="";


$connx = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connx) {
  die("Connection failed: " . mysqli_connect_error());
}

if($sic==null){
$sqlx = "SELECT * FROM `user`";
}
else
{
  $sqlx = "SELECT * FROM `user` where ic=".$sic;
}


$resultx = mysqli_query($connx, $sqlx);
if($resultx==null){
return;
}
if (mysqli_num_rows($resultx) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($resultx)) {
  $name=  $row["Name"];
  $ic = $row["IC"];
  $address=  $row["Address"];
  $hp=  $row["Phone Number"];
  }
} else {
  echo "0 results";
}

mysqli_close($connx);



}





?>

        <div class="w3-container w3-blue">
        <table>
            <tr>
                <td>Name : </td><td><?php echo $name ?></td>
            </tr>
            <tr>
                <td>IC :</td><td><?php echo $ic ?></td>
            </tr>
        </table>
</div>
        <br>
        
        <div class="w3-container w3-blue">
        <table>
            <tr>
                <td>Address : </td><td><?php echo $address?></td>
            </tr>
            <tr>
               
            </tr>
        </table>
        

  
        </div>

      </div>
      <div class="w3-twothird">
        <h5>Log</h5>
        <table class="w3-table w3-striped w3-white">
  <tr>
    <th>No.</th>
    <th>Authority</th>
    <th>Company Name</th>
    <th>address</th>
    <th> In</th>
    <th> Out</th>
</tr>


         <?php 
         





           //database
           $servername = "Cweedsolution.ddns.net";
           $username = "admin";
           $password = "XLjFk9GyelOgLB6W";
           $dbname = "hackathon";
   
   
         
         $conn = mysqli_connect($servername, $username, $password, $dbname);

         //search
         if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
         }

       


          if($sic==null){
         
          }else{
            
            $sql = "SELECT * FROM `auth` INNER JOIN checktable ON checktable.authID=auth.`Business-code` WHERE checktable.ic='".$ic."' Group by checktable.In_Time";
          
           
                    
          $result = $conn->query($sql);
           if ($result->num_rows > 0) {
          // output data of each row
          $i=0;
      
          while($row = $result->fetch_assoc()) {
        // reference      echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

         //display

         
         $bc="";
            $bn=$row["Name"];
            $add=$row["address"];

     
        $i++;


         $newdata='<tr id="'.$i.'" onclick="clickfunc('.$i.')"><td>'.$i.'</td><td>'.$row["authID"].'</td><td>'.$bn."</td><td>".$add."</td><td>".$row["In_Time"]."</td><td>".$row["out_time"]."</td></tr>";


          echo $newdata;
           

          }
          } else {
          echo "0 results";
          }
          $conn->close();

        }
         


         
         ?>
        </table>
      </div>
    </div>
  </div>
  <hr>



<!-- The Modal -->
<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2 id="mhead">Modal Header</h2>
      </header>
      <div class="w3-container">
        <p id="innerBody">Some text..</p>
        
      </div>
      <footer class="w3-container w3-teal">
        <p id="mfoot">Modal Footer</p>
      </footer>
    </div>
  </div>
</div>



  <script>
function encode_utf8(s) {
  return unescape(encodeURIComponent(s));
}

function toTimestamp(strDate){
 var datum = Date.parse(strDate);
 return datum/1000;
}

function clickfunc(params){
  tablex = document.getElementById("innerBody");
var Row = document.getElementById(params);
var Cells = Row.getElementsByTagName("td");
//window.location.replace('http://cweedsolution.ddns.net/hackathon/choice/GovernmentForm/Peoplesearch.php?url="'+params+'"');

var add =Cells[3].innerText;
var inx=  Cells[4].innerText;//window.btoa(Cells[4].innerText);
var outx=Cells[5].innerText;// window.btoa(Cells[5].innerText);



//alert("test: "+params+" base64:"+ add+"   "+Cells[4].innerText+"     "+Cells[5].innerText);
//<a href="http://cweedsolution.ddns.net/hackathon/choice/GovernmentForm/Peoplesearch.php?url='.$IC.'">

document.getElementById('id01').style.display='block';


$.post("./php/potentialSpread.php", { param:add, inTime:inx,outTime:outx, dataType: "json"}) 
          .done(function(response) { 
            //alert(response);
            tablex.innerHTML=response;
           //var obj = JSON.parse(response);
           //  totalin.innerText=obj.in;
            // totalout.innerText=obj.out;
             //totalactive.innerText=obj.active;
             //totaluser.innerText=obj.total;
        
         });

}
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

  </script>

  
  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    
  </footer>

  <!-- End page content -->
</div>



</body>
</html>




















