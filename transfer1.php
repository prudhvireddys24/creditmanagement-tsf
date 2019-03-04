<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #7575a3;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */

</style>
</head>
<body>
    <form action="indextsf1.php"> <button>View Users</button></form>
    
   <form class="modal-content animate" method="post" action="transfer1.php">
    

    <div class="container">
      <label for="fromid"><b>Sender id</b></label>
      <input type="text" placeholder="Enter from id" name="fromid" required>
      
      <label for="toid"><b>Receiver id</b></label>
      <input type="text" placeholder="Enter to id" name="toid" required>
      <label for="amount"><b>Amount</b></label>
      <input type="text" placeholder="Enter amount" name="amount" required>

      <button type="submit">Transfer</button>

      
    </div>

  </form>

</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>

<?php
$fromid = filter_input(INPUT_POST, 'fromid');
 $toid = filter_input(INPUT_POST, 'toid');
  $amount = filter_input(INPUT_POST, 'amount');
  $time = date("D/M/Y");
   
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "credit management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 
else{
  
  $sql = "INSERT INTO transfers (from_id, to_id, credits)
  VALUES ('$fromid','$toid','$amount')";

$sql1 = "UPDATE users SET credits=credits-$amount WHERE id='$fromid'";
  $sql2 = "UPDATE users SET credits=credits+$amount WHERE id='$toid'";

  if ($conn->query($sql1) === TRUE) {
  if ($conn->query($sql2) === TRUE){
    if ($conn->query($sql) === TRUE) {
      echo "success";
     }
    else {
    echo "string";
    }
  }
    }}


$conn->close();
?>
