<!DOCTYPE html>
<html>
<title>Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}


</style>
<body class="w3-light-grey">
<?php        



$TodayIN=$TodayOut=$TotalIN=$TotalOut=$BName="";


session_start();
$bc= $_SESSION['bc'];
$add= $_SESSION['Address'];


if($bc==null){
  echo '<script>window.location.href = "https://Cweedsolution.ddns.net/hackathon/choice/Authorityform/"</script>';
}

$qservername = "Cweedsolution.ddns.net";
$qusername = "admin";
$qpassword = "XLjFk9GyelOgLB6W";
$qdbname = "hackathon";





$qconn = new mysqli($qservername, $qusername, $qpassword, $qdbname);
// Check connection
if ($qconn->connect_error) {
    die("Connection failed: " . $qconn->connect_error);
}

$sql = "SELECT * FROM `auth` where `Business-code`='".$bc."' ";
$result = $qconn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $BName =$row["Name"];
    }
} else {
    echo "0 results";
}
$qconn->close();



















/////////////////////////////
/////////////////////////////
/////////////////////////////
/////////////////////////////
//////////total IN///////////
/////////////////////////////
/////////////////////////////
/////////////////////////////

$qconn = new mysqli($qservername, $qusername, $qpassword, $qdbname);
// Check connection
if ($qconn->connect_error) {
    die("Connection failed: " . $qconn->connect_error);
}

$sql = 'SELECT COUNT(`In_Time`) as c FROM `checktable` where `authID`="'.$bc.'" AND `Address`="'.$add.'"' ;
$result = $qconn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $TotalIN =$row["c"];
    }
} else {
    echo "0 results";
}
$qconn->close();

/////////////////////////////
/////////////////////////////
/////////////////////////////
/////////////////////////////
//////////total out//////////
/////////////////////////////
/////////////////////////////
/////////////////////////////


$qconn = new mysqli($qservername, $qusername, $qpassword, $qdbname);
// Check connection
if ($qconn->connect_error) {
    die("Connection failed: " . $qconn->connect_error);
}

$sql = 'SELECT COUNT(`out_time`) as c FROM `checktable` where `authID`="'.$bc.'" AND  `address`="'.$add.'"';
$result = $qconn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $TotalOut =$row["c"];
    }
} else {
    echo "0 results";
}
$qconn->close();


/////////////////////////////
/////////////////////////////
/////////////////////////////
/////////////////////////////
//////////today IN///////////
/////////////////////////////
/////////////////////////////
/////////////////////////////


$qconn = new mysqli($qservername, $qusername, $qpassword, $qdbname);
// Check connection
if ($qconn->connect_error) {
    die("Connection failed: " . $qconn->connect_error);
}

$sql = 'SELECT COUNT(*) AS c FROM `checktable`  WHERE `authID`="'.$bc.'"AND  `Address`="'.$add.'" AND `In_Time` LIKE "%'.date("Y-m-d").'%" ';
$result = $qconn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $TodayIN =$row["c"];
    }
} else {
    echo "0 results";
}
$qconn->close();



/////////////////////////////
/////////////////////////////
/////////////////////////////
/////////////////////////////
//////////today out///////////
/////////////////////////////
/////////////////////////////
/////////////////////////////

$qconn = new mysqli($qservername, $qusername, $qpassword, $qdbname);
// Check connection
if ($qconn->connect_error) {
    die("Connection failed: " . $qconn->connect_error);
}

$sql = 'SELECT COUNT(*) AS c FROM `checktable`  WHERE `authID`="'.$bc.'"AND  `Address`="'.$add.'" AND `out_time` LIKE "%'.date("Y-m-d").'%"';
$result = $qconn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $TodayOut =$row["c"];
    }
} else {
    echo "0 results";
}
$qconn->close();











?>
<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"><a href="https://Cweedsolution.ddns.net/hackathon/choice/Authorityform/Profile.php">Back</a></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">

    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo $BName?></strong></span><br>

    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> <?php echo date("d-m-Y")?></b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo  $TodayIN."<br>";?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>In</h4>
      </div>
      </div>

    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
        <h3><?php echo  $TodayOut."<br>";?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Out</h4>
      </div>
    </div>

    <div class="w3-quarter">
      <div class="w3-container w3-green w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
        <h3><?php echo  $TotalIN."<br>";?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total In</h4>
      </div>
    </div>


    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
        <h3><?php echo  $TotalOut."<br>";?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total out</h4>
      </div>
    </div>
  </div>

<?php

if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
} else {
  $pageno = 1;
}


$servername = "Cweedsolution.ddns.net";
$usernamex = "admin";
$password = "XLjFk9GyelOgLB6W";
$dbname = "hackathon";


$conn=mysqli_connect($servername,$usernamex,$password,$dbname);
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}


$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page; 



 
$total_pages_sql = 'SELECT COUNT(*) FROM `checktable` where `authID`="'.$bc.'"AND  `Address`="'.$add.'"';
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);



$sql = 'SELECT * FROM `checktable` where `authID`="'.$bc.'"AND  `Address`="'.$add.'" LIMIT '.$offset.','. $no_of_records_per_page; 


$result = $conn->query($sql);


?>
 

  <div class="w3-container">
    <h5>List</h5>
    <table id="myTable" class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
    <tr>
    <th class="w3-orange" onclick="sortTable(0)">IC</th>
    <th class="w3-green" onclick="sortTable(1)">In Time</th>
    <th class="w3-yellow" onclick="sortTable(2)">Out Time</th>
</tr>
<?php



if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    if($row["out_time"]==null){
      echo '<tr class="w3-red"><td> ' . $row["ic"]. '</td><td> ' . $row["In_Time"]. '</td><td>' . $row["out_time"]. '</td></tr>';
    }
    else{
      echo '<tr class="w3-blue"><td> ' . $row["ic"]. '</td><td> ' . $row["In_Time"]. '</td><td>' . $row["out_time"]. '</td></tr>';

    }
  }
} else {
  echo "0 results";
}




?>




    </table><br>
    <ul class="pagination">
    <a><a  class="w3-button" href="?pageno=1">First</a></a>
    <a class=" <?php if($pageno <= 1){ echo 'disabled'; } ?>">
        <a class="w3-button" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
    </a>

    <?php
    
    for ($x = 1; $x <=  $total_pages; $x++) {

      if($x==$pageno){

        echo '<a class="w3-button w3-green" href="?pageno='.$x.'">'.$x.' </a> ';
      }else{
      echo '<a class="w3-button" href="?pageno='.$x.'">'.$x.' </a> ';
      }
    }
    
    
     ?>




    <a class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a class="w3-button" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
    </a>
    <a><a  class="w3-button" href="?pageno=<?php echo $total_pages; ?>">Last</a></a>
</ul>
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
