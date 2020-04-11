




<!DOCTYPE html>
<html>
<title>Dashboard</title>
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
    <a href="./Dashboard.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="./Peoplesearch.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  People Search</a>
    <a href="./locationsearch.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Location Search</a>

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

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="totalin"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total in</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="totalout"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total out</h4>
      </div>
    </div>
    <div onclick=" getActive()" class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="totalactive"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4 >Total Active</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="totaluser"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>

  <script>

var totalin= document.getElementById("totalin");
var totalout= document.getElementById("totalout");
var totalactive= document.getElementById("totalactive");
var totaluser= document.getElementById("totaluser");
var myVar = setInterval(myTimer, 1000);

function myTimer() {
  $.post("db.php", { IC: "test", Status: "test", dataType: "json"}) 
          .done(function(response) { 

           var obj = JSON.parse(response);
             totalin.innerText=obj.in;
             totalout.innerText=obj.out;
             totalactive.innerText=obj.active;
             totaluser.innerText=obj.total;
        
         });
}
</script>

  <div class="w3-container">






    <h5>Traffic Flow</h5>
    <table id ="myTable" class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">

    <tr>
    <th onclick=" sortTable(0)">Company Name</th>
    <th onclick=" sortTable(1)">Company Code</th>
    <th onclick=" sortTable(2)">Total Traffic</th>
</tr>


    <?php 
    
    $servername = "Cweedsolution.ddns.net";
    $username = "admin";
    $password = "XLjFk9GyelOgLB6W";
    $dbname = "hackathon";


    
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT auth.`Name`,`authID`,COUNT(`In_Time`) as total
FROM checktable INNER JOIN auth on auth.`Business-code` = checktable.authID 
GROUP BY authID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr id = "table'.$row["authID"].'"onclick=clicktest("'.$row["authID"].'")>        <td id="'.$row["Name"].'" >'.$row["Name"].'</td>  <td id="'.$row["authID"].'" >'.$row["authID"].'</td>        <td class="w3-blue" >'.$row["total"].'</td>      </tr>';
    }
} else {
    echo "0 results";
}
$conn->close();
    
    
    
    
    ?>


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




<Script>



function clicktest1(params){






var Row = document.getElementById("table1"+params);
var Cells = Row.getElementsByTagName("td");
window.location.replace('http://cweedsolution.ddns.net/hackathon/choice/GovernmentForm/Peoplesearch.php?url="'+params+'"');
//alert("test: "+params+"   "+Cells[0].innerText);
//<a href="http://cweedsolution.ddns.net/hackathon/choice/GovernmentForm/Peoplesearch.php?url='.$IC.'">

}


</script>




<script>

var modal = document.getElementById("myModal");
var mhead = document.getElementById("mhead");
var mfoot = document.getElementById("mfoot");

// Get the button that opens the modal


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


function clicktest(params){
tablex = document.getElementById("innerBody");
document.getElementById('id01').style.display='block';




var Row = document.getElementById("table"+params);
var Cells = Row.getElementsByTagName("td");
mhead.innerText=Cells[0].innerText;
mfoot.innerText="Total Traffic : "+Cells[2].innerText



$.post("./php/calltable.php", { param: params, Status: "test", dataType: "json"}) 
          .done(function(response) { 

            tablex.innerHTML=response;
           //var obj = JSON.parse(response);
           //  totalin.innerText=obj.in;
            // totalout.innerText=obj.out;
             //totalactive.innerText=obj.active;
             //totaluser.innerText=obj.total;
        
         });










tablex.innerHTML=params;






}



function getActive(params){
tablex = document.getElementById("innerBody");
document.getElementById('id01').style.display='block';




//var Row = document.getElementById("table"+params);
//var Cells = Row.getElementsByTagName("td");
//mhead.innerText=Cells[0].innerText;
//mfoot.innerText="Total Traffic : "+Cells[2].innerText



$.post("./php/active.php", { param: params, Status: "test", dataType: "json"}) 
          .done(function(response) { 

            tablex.innerHTML=response;
           //var obj = JSON.parse(response);
           //  totalin.innerText=obj.in;
            // totalout.innerText=obj.out;
             //totalactive.innerText=obj.active;
             //totaluser.innerText=obj.total;
        
         });










tablex.innerHTML=params;






}





// When the user clicks the button, open the modal 


function get(value) {

	btn.innerText=value;
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}








function callPHP(params) {
  
  $.post("db.php", { id: "test", Status: "test", dataType: "json"}) 
          .done(function(response) { 

           var obj = JSON.parse(response);
             totalin.innerText=obj.in;
             totalout.innerText=obj.out;
             totalactive.innerText=obj.active;
             totaluser.innerText=obj.total;
        
         });


}





// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}





</script>







    </table><br>
    <!--button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button-->
  </div>
  <hr>

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


<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

</body>
</html>
