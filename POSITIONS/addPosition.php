<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'election';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ").$conn->connect_error;
    }
    $posName = $_POST['posName'];
    $numOfPositions = $_POST['numOfPositions'];

    $sql = "INSERT INTO position (posName,numOfPositions) VALUES ('$posName','$numOfPositions')";
    if ($conn->query($sql) === TRUE){
        echo "<script>
            alert('Added Successfully');
            window.location.href = 'viewPosition.php';
            </script>   ";
    } else {
        echo "Unable to add: ".$conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang = 'en'>
<head>
    <meta charset = 'UTF-8'>
    <meta name = "viewpoint" content = "width = device-width, initial-scale = 1.0">
    <title>Add Position</title>
    <link rel = "stylesheet" href = "../CSS/styles.css">
</head>
<body>
    <ul>
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="../POSITIONS/viewPosition.php">Position</a></li>
        <li><a href="../Voters/viewVoters.php">Voters</a></li>
        <li><a href="../Candidates/viewCandidates.php">Candidates</a></li>
        <li><a href="../Votes/viewVotes.php">Votes</a></li>
    </ul>
    <form action = "" method = "post">
        <h1>Add Position</h1>
        <label for = "posName">Position Name: </label>
        <input type = "text" id = 'posName' name = 'posName' required><br><br>

        <label for = "numOfPositions">Number of Positions:</label>
        <input type = "number" id = 'numOfPositions' name = 'numOfPositions' required><br><br>
    
    <button type = "submit" id = 'addBtn'>Add Position</button>
    <button type = "reset">Cancel</button>
    </form>
</body>
</html>