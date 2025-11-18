<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'Election';

$conn = new mysqli($host,$username, $password, $db);
if ($conn->connect_error){
    die ("Connection Error: ".$conn->connect_error);
}

$posID = $_GET['posID'];

$sql = "DELETE FROM position WHERE posID = '$posID'";
if ($conn->query($sql)){
    echo "<script>
        alert ('Deleted Successfully');
        window.location.href = '../POSITIONS/viewPosition.php';
          </script>";
}
$conn->close();
?>