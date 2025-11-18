<?php
if ($_SERVER["REQUEST_METHOD"] === 'POST'){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'election';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ").$conn->connect_error;
    }

    $posID = $_POST['posID'];

    $sql = "UPDATE position set posStat = 'open' where posID = '$posID'";
    if ($conn->query($sql) === TRUE ){
        echo "Activated Successfully";
    } else {
        echo "Unable to activate: ".$conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang = 'en'>
<head>
    <meta charset = 'UTF-8'>
    <meta name = "viewpoint" content = "width = device-width, initial-scale = 1.0">
    <title>Activate Position</title>
</head>
<body>
    <form action = '' method='post'>
        <label for = "posID"> Position ID to Activate:</label>
        <input type = "text" id = "posID" name = "posID" required><br><br>
        
        <button type = "submit">Activate Position</button>
        <button type = "reset">Cancel</button>
    </form>
</body>
</html>