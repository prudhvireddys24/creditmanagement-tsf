<!DOCTYPE html>
<html>
<head>
    <title>
        View Users
    </title>
    <style >
#ctstyle
 {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#ctstyle td, #ctstyle th {
    border: px solid #ddd;
    padding: 8px;
}

#ctstyle tr:nth-child(even){background-color: #f2f2f2;}

#ctstyle tr:hover {background-color: #ddd;}

#ctstyle th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #7575a3;
    color: white;
}       
    </style>
</head>
<body>
    <h2 align="center">User details</h2>
<table id="ctstyle">
    <form action="transfer1.php">
    <tr>
        
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Credits</th>
        <th>Details</th>
       </tr>

      
<?php
$id = filter_input(INPUT_POST, 'id');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "creditmanagement";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

   $sql = 'SELECT * FROM users';

$result = mysqli_query($conn, $sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["id"]."</td>
        <td>" . $row["name"]. "</td>
  
      <td>" . $row["email"]."</td>
        <td>" . $row["phone"]. "</td>
        <td>" . $row["credits"]. "</td>
        <td><button >More</button></td>
        </tr>";

}
} else {
    echo "0 results";
}
$conn->close();
?>

       </form>
 </table>


</body>
</html>