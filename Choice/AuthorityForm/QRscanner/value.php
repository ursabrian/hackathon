<?php
//url = 'http://api.music.com/album';

$IC = urlencode($_POST['IC']);   
$Status = urlencode($_POST['Status']); 
session_start();
$bc= $_SESSION['bc'];
$add= $_SESSION['Address'];



$servername = "Cweedsolution.ddns.net";
$username = "admin";
$password = "XLjFk9GyelOgLB6W";
$dbname = "hackathon";


$dbic = $dbauth = $dbIN =$dbOUT =$dbDone="";
$checkin=0;
$checkout=0;
$verifyICcheck=0;
$addressmatch=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `checktable` where NOT Done=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         
       $dbic= $row["ic"];
       $dbauth= $row["authID"];
       $dbadd= $row["address"];
       $dbIN= $row["In_Time"];
       $dbOUT= $row["out_time"];
      
       
//checkIC exist
if( $dbic==$IC){
    
    //checkAuthID exist
    if( $dbauth==$bc){
        $checkin=1;
    }
    //CheckOutTime Null
    if($dbOUT!=null){
        $checkout=1;
    }

       //CheckOutTime Null
       if($dbadd==$add){
        $addressmatch=1;
    }
     
}



    }
} else {
  echo "Already Update";
}
//conn->close();




$conn->close();









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
        if($checkin!=1 && $addressmatch!=1){
            $sql = "INSERT INTO `checktable`(`ic`,`address`, `authID`, `In_Time`) VALUES ('".$IC."','".$add."','".$bc."','".date("Y-m-d H:i:s")."')";
            CallDatabase($sql);

           // Echo "Check In Successful";
        }
    }

    Echo "Check In Successful";
    


}

if($Status=="OUT"){
    if($checkout!=1){
        if($checkin==1 && $addressmatch==1){
            $sql = "UPDATE `checktable` SET `out_time`='".date("Y-m-d H:i:s")."',`Done`=1 WHERE  authID='".$bc."'AND ic='".$IC."' AND `Address`='".$add."'";
            CallDatabase($sql); 
            Echo "Check Out Successful";
        }
    }
   // echo $addressmatch;
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


//echo $IC."    ".$Status."    ".$bc; //Return the response back to AJAX, assuming it is already returned as JSON. Else encode it json_encode($response)

?>