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

</style>
</head>
<body>
    <form action="indextsf1.php"> <button>View Users</button></form>
    
   <form  method="post" action="transfer1.php">
    

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
$dbname = "creditmanagement";

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
