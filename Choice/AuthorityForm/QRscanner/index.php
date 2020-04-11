<html>
<head>
  <meta charset="utf-8">
  <title>Scanner</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
  <script src="./jsQR.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
  <style>





    body {
      font-family: 'Ropa Sans', sans-serif;
      color: #333;
      max-width: 640px;
      margin: 0 auto;
      position: relative;
    }

    #githubLink {
      position: absolute;
      right: 0;
      top: 12px;
      color: #2D99FF;
    }

    h1 {
      margin: 10px 0;
      font-size: 40px;
    }

    #loadingMessage {
      text-align: center;
      padding: 40px;
      background-color: #eee;
    }

    #canvas {
      width: 100%;
    }

    #output {
      margin-top: 20px;
      background: #eee;
      padding: 10px;
      padding-bottom: 0;
    }

    #output div {
      padding-bottom: 10px;
      word-wrap: break-word;
    }

    #noQRFound {
      text-align: center;
    }
  </style>






<style>
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 100px;
  font-size: 64px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 100; opacity: 0;} 
  to {bottom: 150px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 100; opacity: 0;}
  to {bottom: 150px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 150px; opacity: 1;} 
  to {bottom: 100; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 150px; opacity: 1;}
  to {bottom: 100; opacity: 0;}
}
</style>



<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 24px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5%;
  height: 100px;
  width: 100%;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
  
   color: white;
   text-align: center;
   
}
</style>



















</head>
<body id="body">


<?php 

session_start();
$bc= $_SESSION['bc'];
if($bc==null){
  echo '<script>window.location.href = "https://Cweedsolution.ddns.net/hackathon/choice/Authorityform/"</script>';
}
?>
<div class="w3-dropdown-hover">
  <button class="w3-button w3-grey w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-dropdown-content w3-bar-block w3-border">
      <a href="https://Cweedsolution.ddns.net/hackathon/choice/Authorityform/" class="w3-bar-item w3-button">Back</a>
    
    </div>

</div>
  <h1>Scanner</h1>
 
  <p></p>
  <div id="loadingMessage">🎥 Unable to access video stream (please make sure you have a webcam enabled)</div>
  <canvas id="canvas" hidden></canvas>
  <div id="output" hidden>
    <div id="outputMessage">No QR code detected.</div>
    <div hidden><b>Data:</b> <span id="outputData" value = "showHint(this.value)"></span></div>
  
  </div>


<br><br><br><br><br><br>
<div id="snackbar">test</div>



<div class="footer">
<button id="myDIV"  class="button" onclick="CheckFunction()"  >Press to Select IN or OUT</button>
</div>






















  <script >
    var video = document.createElement("video");
    var canvasElement = document.getElementById("canvas");
    var canvas = canvasElement.getContext("2d");
    var loadingMessage = document.getElementById("loadingMessage");
    var outputContainer = document.getElementById("output");
    var outputMessage = document.getElementById("outputMessage");
    var  outputStatus = document.getElementById("outputstatus");
    var outputData = document.getElementById("outputData");
    CheckFunction();

    function myFunction(message) {
  var x = document.getElementById("snackbar");
  x.className = "show";
  x.innerText= message;
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
var x;

function CheckFunction() {
  x = document.getElementById("myDIV");
  var x2 = document.getElementById("body");
  if (x.innerHTML === "IN") {
    x.style.background='#fc0341';
    x2.style.backgroundColor = "Yellow";
    x.innerHTML = "OUT";
  } else {
    x.style.background='#fcdb03';
    x2.style.backgroundColor = "Red";
    x.innerHTML = "IN";
  }
}


    function drawLine(begin, end, color) {
      canvas.beginPath();
      canvas.moveTo(begin.x, begin.y);
      canvas.lineTo(end.x, end.y);
      canvas.lineWidth = 4;
      canvas.strokeStyle = color;
      canvas.stroke();
    }

    // Use facingMode: environment to attemt to get the front camera on phones
    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
      video.srcObject = stream;
      video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
      video.play();
      requestAnimationFrame(tick);
    });

    function tick() {
      loadingMessage.innerText = "⌛ Loading video..."
      if (video.readyState === video.HAVE_ENOUGH_DATA) {
        loadingMessage.hidden = true;
        canvasElement.hidden = false;
        outputContainer.hidden = false;

        canvasElement.height = video.videoHeight;
        canvasElement.width = video.videoWidth;
        canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
        var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
        var code = jsQR(imageData.data, imageData.width, imageData.height, {
          inversionAttempts: "dontInvert",
        });
        if (code) {
          drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
          drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
          drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
          drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
          outputMessage.hidden = true;
          outputData.parentElement.hidden = false;
          outputData.innerText = code.data;
        
          $.post("value.php", { IC:  code.data, Status: x.innerHTML, dataType: "json"}) //prepare and execute post
          .done(function(response) { //Once we receive response from PHP script
            //Do something with the response:
           // alert("The album name is: " +response);
           
           myFunction(response);
           //outputStatus.innerText=response;
         
            //Look into JSON.parse and JSON.stringify for accessing data 
         });

        



                  
        } else {
          outputMessage.hidden = false;
          outputData.parentElement.hidden = true;
        }
      }
      requestAnimationFrame(tick);
    }
  </script>
















</body>
</html>
