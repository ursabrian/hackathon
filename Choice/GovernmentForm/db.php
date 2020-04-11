
<?php
//url = 'http://api.music.com/album';

$IC = urlencode($_POST['IC']);   
$Status = urlencode($_POST['Status']); 










$servername = "Cweedsolution.ddns.net";
$username = "admin";
$password = "XLjFk9GyelOgLB6W";
$dbname = "hackathon";

$dbauth = $dbIN =$dbOUT =$totalactive="";
$checkin=0;
$checkout=0;
$verifyICcheck=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(`In_Time`) as 'in',COUNT(`out_time`) as 'out' FROM `checktable`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         
      
       $dbIN= $row["in"];
       $dbOUT= $row["out"];
      

//checkIC exist




    }
} else {
   // echo "Check out:".$checkout."Check in:".$checkin."";
}
//conn->close();

$totalactive=$dbIN-$dbOUT;



$conn->close();
$total="";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) as 'total'FROM `user`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         
      
        $total= $row["total"];
       
      

//checkIC exist




    }
} else {
   // echo "Check out:".$checkout."Check in:".$checkin."";
}
//conn->close();

$totalactive=$dbIN-$dbOUT;



$conn->close();


echo '{"in":"'.$dbIN.'","out": "'.$dbOUT.'","active": "'.$totalactive.'","total": "'.$total.'"}';




/*

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `user`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         
       $verifyIC= $row["IC"];
        if($verifyIC==$IC){
            $verifyICcheck=1;
        }

  }
} else {
   // echo "Check out:".$checkout."Check in:".$checkin."";
}


$conn->close();











if( $verifyICcheck==1){

if($Status=="IN"){

    if($checkout!=1){
        if($checkin!=1){
            $sql = "INSERT INTO `checktable`(`ic`, `authID`, `In_Time`) VALUES ('".$IC."','".$bc."','".date("Y-m-d H:i:s")."')";
            CallDatabase($sql);

           // Echo "Check In Successful";
        }
    }

    Echo "Check In Successful";
    


}

if($Status=="OUT"){
    if($checkout!=1){
        if($checkin==1){
            $sql = "UPDATE `checktable` SET `out_time`='".date("Y-m-d H:i:s")."',`Done`=1 WHERE  authID='".$bc."'AND ic='".$IC."'";
            CallDatabase($sql); 
            //Echo "Check Out Successful";
        }
    }

    Echo "Check Out Successful";
}
}else{
    echo "Invalid IC";
}


function CallDatabase($sql) {
    $servername = "Cweedsolution.ddns.net";
    $username = "admin";
    $password = "XLjFk9GyelOgLB6W";
    $dbname = "hackathon";
    $check = false;
    
    
    //echo $name.$hp.$state. $address.$city.$bcode.$pw;
   

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    
    //echo $sql;
    if ($conn->query($sql) === TRUE) {
       
       // echo "Register Success";
       //echo '<script>window.location.href = "http://cweedchow.ddns.net/hackathon/choice/Authorityform/"</script>';
        ;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    
    //header("Location: /hackathon/choice/enduserform");

   
}
*/

//echo $IC."    ".$Status."    ".$bc; //Return the response back to AJAX, assuming it is already returned as JSON. Else encode it json_encode($response)

?>